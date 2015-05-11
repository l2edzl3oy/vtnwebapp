<?php

// src/AppBundle/Menu/Builder.php
namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        // access services from the container!
        // $em = $this->container->get('doctrine')->getManager();
        // findMostRecent and Blog are just imaginary examples
        // $blog = $em->getRepository('AppBundle:Blog')->findMostRecent();

        $menu->addChild('Network Definitions', array('route' => 'admin'));
        $menu->addChild('Network Logic', array('route' => 'logic'));
        $menu->addChild('Network Statistics', array('route' => 'statistics'));
        
        // you can also add sub level's to your menu's as follows
        // $menu['Network Definitions']->addChild('Edit profile', array('route' => 'homepage'));

        // ... add more children

        return $menu;
    }
}