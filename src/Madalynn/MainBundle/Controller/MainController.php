<?php

namespace Madalynn\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of Main
 *
 * @author Sébastien Brochet <blinkseb@madalynn.eu>
 */
class MainController extends Controller {

  public function homepageAction() {
    $em = $this->getDoctrine()->getEntityManager();
    $repo = $em->getRepository('MadalynnMainBundle:Article');
    $articles = $repo->findAll();

    return $this->render('MadalynnMainBundle:Main:index.html.twig', array('articles' => $articles));
  }

}

?>
