<?php

namespace Madalynn\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of Main
 *
 * @author Sébastien Brochet <blinkseb@madalynn.eu>
 */
class AdminController extends Controller {

  public function homepageAction() {
    return $this->render('MadalynnMainBundle:Admin:index.html.twig');
  }

}

?>
