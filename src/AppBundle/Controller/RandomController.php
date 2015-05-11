<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// src/AppBundle/Controller/RandomController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RandomController extends Controller {

    public function indexAction($limit) {
        $number = rand(1, $limit);
        return new Response($number);
    }

}
