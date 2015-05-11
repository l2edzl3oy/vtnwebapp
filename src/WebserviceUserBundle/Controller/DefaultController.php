<?php

namespace WebserviceUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WebserviceUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
