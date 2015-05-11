<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class VtnController
{
    public function getVtnAction()
    {
        $curl_handle=curl_init();
	curl_setopt($curl_handle,CURLOPT_URL,'http://192.168.248.4:8080/controller/nb/v2/vtn/default/vtns');
	curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($curl_handle,CURLOPT_USERPWD,"admin:admin");
	$buffer = curl_exec($curl_handle);
	curl_close($curl_handle);
        $json = json_decode($buffer);
        return new Response( '<pre>'. json_encode($json, JSON_PRETTY_PRINT) . '</pre>' );
    }
}

