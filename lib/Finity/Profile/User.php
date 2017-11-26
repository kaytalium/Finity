<?php

namespace Finity\Profile;

class User extends Person{
    //private vars
    private $username;
    private $password;

    public function __construct($arg = array()){
        $this->username = (isset($arg['username'])?$arg['username']:"");
        $this->password = (isset($arg['password'])?$arg['password']:"");

        //parent::_construct($arg);
    }

    //Getters
    public function get_username(){
        return $this->username;
    }

    public function get_password(){
        return $this->password;
    }

    public function get_profile(){
        return array(
            'user'          =>$this->username,
            'pswd'          =>'yes',
            'firstname'     =>$this->get_firstname(),
            'lastname'      =>$this->get_lastname()
        );
    }

    //Setters
    public function set_password($password){
        $this->password = $password;
    }

    public function set_username($username){
        $this->username = $username;
    }

    //Other public functions
    public function loginQueryString(){
        return "SELECT `password` FROM user WHERE `username`=$this->username";
    }

}