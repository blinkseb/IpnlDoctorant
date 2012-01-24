<?php

namespace Madalynn\MainBundle\Twig\Extension;

/**
 * UserSortExtension
 *
 * @author Sébastien Brochet <blinkseb@madalynn.eu>
 */
class MyExtensions extends \Twig_Extension
{

    public function getName()
    {
        return 'MyExtensions';
    }

    public function getFilters()
    {
        return array(
            'user_sort' => new \Twig_Filter_Method($this, 'user_sort'),
            'localeDate' => new \Twig_Filter_Method($this, 'localeDate')
        );
    }

    public function user_sort($users, $year = 1, $sortby = 'group')
    {
        $sorted_users = array();
        foreach ($users as $user) {
            if ($user->getThesisYear() == $year)
                $sorted_users[] = $user;
        }

        uasort($sorted_users, function($a, $b) use ($sortby) {
                    $function = 'get' . $sortby;
                    return strcmp($a->$function(), $b->$function());
                });

        return $sorted_users;
    }

    public function localeDate($date, $dateType = 'medium', $timeType = 'none')
    {
        $values = array(
            'none' => \IntlDateFormatter::NONE,
            'short' => \IntlDateFormatter::SHORT,
            'medium' => \IntlDateFormatter::MEDIUM,
            'long' => \IntlDateFormatter::LONG,
            'full' => \IntlDateFormatter::FULL,
        );
        $dateFormater = \IntlDateFormatter::create(
                        \Locale::getDefault(), $values[$dateType], $values[$timeType]
        );
        
        return $dateFormater->format($date);
    }
}