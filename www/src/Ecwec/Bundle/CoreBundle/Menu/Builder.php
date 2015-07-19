<?php


namespace Ecwec\Bundle\CoreBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'core_homepage'));
        $menu->addChild('Stations', array('route' => 'station'));
        $menu['Stations']->addChild('All', array('route' => 'station'));
        $menu['Stations']->addChild('Map', array('route' => 'station_map'));

        // access services from the container!
        $em = $this->container->get('doctrine')->getManager();
        // findMostRecent and Blog are just imaginary examples
        //$blog = $em->getRepository('AppBundle:Blog')->findMostRecent();

        /*$menu->addChild('Latest Blog Post', array(
            'route' => 'blog_show',
            'routeParameters' => array('id' => $blog->getId())
        ));*/

        // you can also add sub level's to your menu's as follows
        //$menu['About Me']->addChild('Edit profile', array('route' => 'edit_profile'));

        // ... add more children

        return $menu;
    }
}
 