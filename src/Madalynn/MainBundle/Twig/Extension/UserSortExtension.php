<?php

namespace Madalynn\MainBundle\Twig\Extension;

/**
 * UserSortExtension
 *
 * @author Sébastien Brochet <blinkseb@madalynn.eu>
 */
class UserSortExtension extends \Twig_Extension {

  public function getName() {
    return 'UserSort';
  }

  public function getFilters() {
    return array(
        'user_sort' => new \Twig_Filter_Method($this, 'user_sort')
    );
  }

  public function user_sort($users, $year = 1) {
    $sorted_users = array();
    foreach ($users as $user) {
      if ($user->getThesisYear() == $year)
        $sorted_users[] = $user;
    }

    return $sorted_users;
  }
}

?>
