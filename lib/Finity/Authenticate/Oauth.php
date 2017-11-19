<?php

namespace Finity\Authenticate;

class Oauth extends \Finity\Authenticate\DatabaseConnection{
    //setup private vars
    private $username;
    private $password;
    private $harsh;

    public function __construct(\Finity\Profile\User $user){
        $this->username = $user->get_username();
        $this->password = $user->get_password();
    }

    public function login(){
        //check to see if user can be authenticate
        return true;
    }

    public function logout(){
        //log logout time and update db with the new value
        return true;
    }

    public function test(){
        return 'Username: '.$this->username.'<br>Password: '.$this->password;
    }
}