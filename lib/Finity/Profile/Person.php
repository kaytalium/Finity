<?php

namespace Finity\Profile;

class Person{

    //private vars
    private $person_id;
    private $firstname;
    private $lastname;
    private $image_url;
    private $dob;

    public function __construct($arg = array()){
        $this->firstname = (isset($arg['firstname'])?$arg['firstname']:"");
        $this->lastname = (isset($arg['lastname'])?$arg['lastname']:"");
        $this->person_id = (isset($arg['person_id'])?$arg['person_id']:"");
        $this->image_url = (isset($arg['image_url'])?$arg['image_url']:"");
        $this->dob = (isset($arg['dob'])?$arg['dob']:"");
    }

    //Getters
    public function get_firstname(){
        return $this->firstname;
    }

    public function get_lastname(){
        return $this->lastname;
    }

    public function get_person_id(){
        return $this->person_id;
    }

    public function get_image_url(){
        return $this->image_url;
    }

    public function get_dob(){
        return $this->dob;
    }

    //Setters
    public function set_firstname($arg){
        $this->firstname = $arg;
    }

    public function set_lastname($arg){
        $this->lastname = $arg;
    }

    public function set_person_id($arg){
        $this->person_id = $arg;
    }

    public function set_image_url($arg){
        $this->image_url = $arg;
    }

    public function set_dob($arg){
        $this->dob = $arg;
    }

    //other public functions
    public function personQueryString($personID){
        //get all the information from the user
    }

}