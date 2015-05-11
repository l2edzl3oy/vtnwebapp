<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// src/Acme/DemoBundle/Controller/RandomController.php
namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class RandomController
{
    public function indexAction($limit)
    {
        return new Response(
            '<html><body>Number: '.rand(1, $limit).'</body></html>'
        );
    }
}