<?php

namespace Ecwec\Bundle\WeatherDataProviderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WeatherDataProviderBundle:Default:index.html.twig', array('name' => $name));
    }
}
