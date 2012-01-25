<?php

namespace Madalynn\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of Main
 *
 * @author Sébastien Brochet <blinkseb@madalynn.eu>
 */
class UserController extends Controller {

  public function listAction() {
    $em = $this->getDoctrine()->getEntityManager();

    $repo = $em->getRepository('MadalynnMainBundle:User');
    $users = $repo->findAll();

    return $this->render('MadalynnMainBundle:User:list.html.twig', array('users' => $users));
  }

}

?>
