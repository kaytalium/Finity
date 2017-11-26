<?php

namespace Finity\Profile;

class Person{

    //private vars
    private $firstname;
    private $lastname;

    public function __construct($arg = array()){
        $this->firstname = (isset($arg['firstname'])?$arg['firstname']:"");
        $this->lastname = (isset($arg['lastname'])?$arg['lastname']:"");

    }

    //Getters
    public function get_firstname(){
        return $this->firstname;
    }

    public function get_lastname(){
        return $this->lastname;
    }

    //Setters
}