<?php

namespace AppBundle\Services;

class CurlService {

    public function curl($url, $method, $body) {
        
        $pos1 = strpos($url, 'statistics');
        $prePreURL = ($pos1 === false) ? 'http://192.168.248.4:8080/controller/nb/v2/vtn/default/': 'http://192.168.248.4:8080/controller/nb/v2/';
        
        $pos = strpos($url, 'flowconditions');
        $preurl = ($pos1 === false && $pos === false) ? 'vtns/' : '';
        
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_URL, $prePreURL . $preurl . $url);
        curl_setopt($curl_handle, CURLOPT_USERPWD, "admin:admin");
        if ( strcmp($method,'POST') == 0) {
            curl_setopt($curl_handle, CURLOPT_POST, 1);
        }
        if (!empty($body)) {
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $body);
        }
        if ( strcmp($method,'DELETE') == 0) {
            curl_setopt($curl_handle,CURLOPT_CUSTOMREQUEST,"DELETE");
        }
        if ( strcmp($method,'PUT') == 0) {
            curl_setopt($curl_handle,CURLOPT_CUSTOMREQUEST,"PUT");
        }
        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array(
            "Accept: application/json",
            "Content-Type: application/json"
        ));
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);
        
        return $buffer;
    }

}
