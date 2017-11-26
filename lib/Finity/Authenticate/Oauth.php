<?php

namespace Finity\Authenticate;

class Oauth extends \Finity\Authenticate\DatabaseConnection{
    //setup private vars
    private $username;
    private $db_password;
    private $harsh;
    private $user;
    private $errors;

    public function __construct(\Finity\Profile\User $user){
        $this->user = $user;
        //$this->username = $user->get_username();
        //$this->password = $user->get_password();
    }

    public function login(){
        //check to see if user can be authenticate
        if(!empty($this->user->get_username())){
            $user_result = $this->select($this->user->loginQueryString());
            if($user_result['state']){
                //once we are here it means the username is in the database
                //@return password, harsh
                //now that we have the password from the database we need to campare 
                //the user password to stored 
                return comparePasswords($user_result);
            }else{
                $this->errors = "Invalid user name";
                return false;
            }
            
            //echo "<br>Username: ".$this->user->get_username().'<br>Password: '.$this->user->get_password();
        }else{
            $this->errors = "No Username was given";
            return false;
        }
        
        
    }

    public function logout(){
        //log logout time and update db with the new value
        return true;
    }

    public function getLoggedInUser(){
        //return USER class with all the information from database
        return new \Finity\Profile\User();
    }

    public function loginErrors(){
        return $this->errors;
    }

    public function comparePasswords($db_result){
        
    }

    public function test(){
        return 'Username: '.$this->username.'<br>Password: '.$this->password;
    }
}