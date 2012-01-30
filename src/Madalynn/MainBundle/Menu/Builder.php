<?php

namespace Madalynn\MainBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Builder
 *
 * @author Sébastien Brochet <blinkseb@madalynn.eu>
 */
class Builder extends ContainerAware
{

    public function mainMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->setAttribute('class', 'nav');

        $menu->addChild('Accueil', array('route' => 'homepage'));
        $menu->addChild('Les doctorants', array('route' => 'user_list'));

        return $menu;
    }

    public function adminMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        $menu->setAttribute('class', 'nav');

        $menu->addChild('Articles', array('route' => 'admin_article'));
        $menu->addChild('Utilisateurs', array('route' => 'admin_users'));

        return $menu;
    }

}

?>
