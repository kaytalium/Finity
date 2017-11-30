<?php

namespace Finity\Profile;

class User extends Person{
    //private vars
    private $username;
    private $password;//is the user typed password

    private $db_password; //password for the database
    private $personId;
    private $harsh;
    private $state;


    /**
     * when a user class is created it has an optional load info of that user
     */
    public function __construct($arg = array()){
        $this->loadUser($arg);
    }

    //Getters
    public function get_username(){
        return $this->username;
    }

    public function get_password(){
        return $this->password;
    }

    public function get_db_password(){
        return $this->db_password;
    }

    public function get_harsh(){
        return $this->harsh;
    }

    public function get_personId(){
        return $this->personId;
    }

    public function get_profile(){
        return array(
            'user'          =>$this->username,
            'firstname'     =>$this->get_firstname(),
            'lastname'      =>$this->get_lastname(),
            'personId'      =>$this->personId,
        );
    }


    

    //Setters
    public function loadUser($arg=array()){
        
        //These var is for the user input
        $this->username     = (isset($arg['username'])?$arg['username']:"");
        $this->password     = (isset($arg['password'])?$arg['password']:"");

        $this->personId     = (isset($arg['personid'])?$arg['personid']:"");
        $this->harsh        = (isset($arg['harsh'])?$arg['harsh']:"");
        $this->db_password  = (isset($arg['secret'])?$arg['secret']:"");
        parent::__construct($arg);
    }

    public function set_password($password){
        $this->password = $password;
    }

    public function set_username($username){
        $this->username = $username;
    }

    //Other public functions
    public function loginQueryString(){
        return "SELECT `secret`,`harsh`,`personid` FROM user WHERE `username`=$this->username";
    }

}