<?php

// src/WebserviceUserBundle/Security/User/WebserviceUserProvider.php
namespace WebserviceUserBundle\Security\User;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class WebserviceUserProvider implements UserProviderInterface
{
    public function loadUserByUsername($username, $password)
    {
        $body = '{"auth": {"tenantName": "'.$username.'", "passwordCredentials": {"username":"'.$username.'", "password":"'.$password.'"}}}';
	$curl_handle=curl_init();
	curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($curl_handle,CURLOPT_URL,'http://192.168.248.101:5000/v2.0/tokens');
	curl_setopt($curl_handle,CURLOPT_POST,1);
	curl_setopt($curl_handle,CURLOPT_POSTFIELDS,$body);
	curl_setopt($curl_handle,CURLOPT_HTTPHEADER,array("Content-Type: application/json"));
	$buffer = curl_exec($curl_handle);

        if (curl_errno($curl_handle) == 0) {
            $info = curl_getinfo($curl_handle);
            if ($info['http_code'] == 200) {
                curl_close($curl_handle);
                $json = json_decode($buffer, true);
                return new WebserviceUser($username, $password, ['ROLE_ADMIN'], $json["access"]["token"]["id"], $json["access"]["token"]["tenant"]["id"]);
            }
        }
        
        throw new UsernameNotFoundException(
            sprintf('Username "%s" does not exist.', $username)
        );
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof WebserviceUser) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername(), $user->getPassword());
    }

    public function supportsClass($class)
    {
        return $class === 'WebserviceUserBundle\Security\User\WebserviceUser';
    }
}
