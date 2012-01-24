<?php

use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Madalynn\MainBundle\Entity\User;

use Faker\Factory as FakerFactory;

class ApplicationFixtures implements FixtureInterface, ContainerAwareInterface {

  private $container;

  public function setContainer(ContainerInterface $container = null) {
    $this->container = $container;
  }

  public function load($manager) {
    $faker = FakerFactory::create("fr_FR");
    $userManager = $this->container->get('fos_user.user_manager');

    for ($i = 0; $i < 30; $i++) {
      $user = new User();

      $user->setUsername($faker->userName);
      $user->setEmail($faker->email);
      $user->setFirstname($faker->firstName);
      $user->setLastname($faker->lastName);
      $user->setGroup($faker->word);
      $user->setLevel($faker->randomElement(array(-1, 0, 1, 2, 3, 4, 5)));
      $user->setPhone($faker->phoneNumber);
      $user->setStatus($faker->randomElement(array("DOCTORANT", "EX-DOCTORANT")));
      $user->setBirthday($faker->dateTimeThisCentury);
      $user->setBeginningyear($faker->dateTimeThisDecade);
      $user->setSoutenance($faker->dateTimeBetween('now', '+10 years'));
      $user->setPlainPassword($faker->lexify("??????"));
      $user->setThesis($faker->sentence(10));
      $user->setOffice($faker->randomNumber(3));

      $userManager->updateUser($user);

      $article = new Madalynn\MainBundle\Entity\Article();
      $article->setAuthor($user);
      $article->setContent($faker->paragraph(3));
      $article->setTitle($faker->sentence);
      $article->setSlug($faker->word);
      $article->setVisible(true);

      $manager->persist($article);
    }

    $manager->flush();
  }

}

?>
