<?php

namespace Finity\Profile;

class User{
    //private vars
    private $username;
    private $password;

    public function _construct($arg = array()){

    }

    //Getters
    public function get_username(){
        return $this->username;
    }

    public function get_password(){
        return $this->password;
    }

    //Setters
    public function set_password($password){
        $this->password = $password;
    }

    public function set_username($username){
        $this->username = $username;
    }
}