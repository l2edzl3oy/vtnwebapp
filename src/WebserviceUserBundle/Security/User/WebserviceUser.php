<?php

// src/WebserviceUserBundle/Security/User/WebserviceUser.php
namespace WebserviceUserBundle\Security\User;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

class WebserviceUser implements UserInterface, EquatableInterface
{
    private $username;
    private $password;
    //private $salt;
    private $roles;
    private $openstackAuthToken;
    private $openstackTenantID;

    public function __construct($username, $password, array $roles, $openstackAuthToken, $openstackTenantID)
    {
        $this->username = $username;
        $this->password = $password;
        //$this->salt = $salt;
        $this->roles = $roles;
        $this->openstackAuthToken = $openstackAuthToken;
        $this->openstackTenantID = $openstackTenantID;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        //return $this->salt;
    }

    public function getUsername()
    {
        return $this->username;
    }
    
    public function getOpenstackAuthToken()
    {
        return $this->openstackAuthToken;
    }
    
    public function getOpenstackTenantID()
    {
        return $this->openstackTenantID;
    }

    public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof WebserviceUser) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }
}
