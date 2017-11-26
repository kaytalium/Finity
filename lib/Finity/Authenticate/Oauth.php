<?php

namespace Finity\Authenticate;

class Oauth extends \Finity\Authenticate\DatabaseConnection{
    //setup private vars
    private $isUserAuthenticated = false;
    private $db_password;
    private $user; // this is a class object
    private $errors;

    public function __construct(\Finity\Profile\User $user){
        $this->user = $user;
    }

    /**
     * User the data recieve when object was created to validate the user and return 
     * boolean state
     */
    public function login(){
        //check to see if user can be authenticate
        if(!empty($this->user->get_username())){
            $user_result = $this->select($this->user->loginQueryString());
            if($user_result['state']){
                //once we are here it means the username is in the database
                //@return secret, harsh, personid
                //now that we have the password from the database we need to campare 
                //the user password to stored 

                //load the user class with the resulting data for user use.
                $this->user->loadUser($user_result['data']);

                //compare and return the boolean state
                return comparePasswords(); 
    
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
        if($this->isUserAuthenticated){
            //now that we know that the user is authenticated we can now grab the person info for the user 
            //from the person table 
            $person_result = $this->select($this->user->personQueryString($this->user->get_personId()));
            if($person_result['state']){
                $this->user->loadUser($person_result['data']);
            }
            return $this->user;
        }
        
    }

    public function loginErrors(){
        return $this->errors;
    }

    public function comparePasswords(){
        //encrypt the password from the user
        $cryptPassword = crypt($this->user->get_password(),$this->user->get_harsh());

        //get the crypt password against database password
        if($cryptPassword === $this->user->get_db_password()){
            $this->user->set_harsh('');
            $this->user->set_db_password('');
            
            //call function to log the time in the activity table
            //set login time
            //$this->logUserEntryTime();
            
            //return true to caller
            return $this->isUserAuthenticated = true;
        }
        else
        {
            $this->errors ="invalid password provided";
            return $this->isUserAuthenticated = false;
            
        }
    }

    public function test(){
        return 'Username: '.$this->username.'<br>Password: '.$this->password;
    }
}