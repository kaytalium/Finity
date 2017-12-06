<?php

namespace Finity\Profile;

class User extends Person{
    //private vars
    private $username;
    private $password;//is the user typed password

    private $user_id;
    private $db_password; //password for the database
    private $harsh;
    private $user_type_id;
    private $status;
    private $type;

    private $typeDef = array(222=>"Admin", 675=>"Normal");
    private $statusDef = array('Suspend','Active');


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

    public function get_user_id(){
        return $this->user_id;
    }

    public function get_user_type_id(){
        return $this->user_type_id;
    }

    public function get_status(){
        return $this->status;
    }

    public function get_status_def(){
        return (isset($this->status)?$this->statusDef[$this->status]:'');
    }

    public function get_type(){
        return $this->type;
    }

    public function get_profile(){
        return array(
            'username'      =>$this->username,
            'firstname'     =>$this->get_firstname(),
            'lastname'      =>$this->get_lastname(),
            'image_url'     =>$this->get_image_url(),
            'dob'           =>$this->get_dob(),
            'person_id'     =>$this->get_person_id(),
            'user_type_id'  =>$this->user_type_id,
            'type'          =>$this->type,
            'password'      =>$this->password,
            'harsh'         =>$this->harsh
        );
    }


    

    //Setters
    public function loadUser($arg=array()){
        
        //These var is for the user input
        $this->username     = (isset($arg['username'])?$arg['username']:$this->username);
        $this->password     = (isset($arg['password'])?$arg['password']:$this->password);
        $this->user_type_id = (isset($arg['user_type_id'])?$arg['user_type_id']:$this->user_type_id);
        $this->status       = (isset($arg['status'])?$arg['status']:$this->status);
        $this->type         = (isset($arg['type'])?$arg['type']:$this->type);

        //from db
        $this->user_id      = (isset($arg['user_id'])?$arg['user_id']:$this->user_id);
        $this->harsh        = (isset($arg['harsh'])?$arg['harsh']:$this->harsh);
        $this->db_password  = (isset($arg['secret'])?$arg['secret']:$this->db_password);
        


        //load the person constructor
        parent::__construct($arg);
    }

    public function set_password($password){
        $this->password = $password;
    }

    public function set_username($username){
        $this->username = $username;
    }

    public function set_harsh($salt){
        $this->harsh = $salt;
    }

    public function set_user_id($id){
        $this->user_id = $id;
    }

    public function set_user_type_id($id){
        $this->user_type_id = $id;
    }

    public function set_status($status){
        $this->user_status = $status;
    }

    public function set_db_password($db_pwd){
        $this->db_password = $db_pwd;
    }

    public function set_type($type){
        $this->type = $type;
    }



    //Other public functions
    public function loginQueryString(){
        return "SELECT `secret`,`harsh`,`person_id`, `user_type_id`, `status` FROM user u WHERE `username`='$this->username'";
    }

    //
    public function userCreateQueryString(){
        return "INSERT INTO `user`(`person_id`, `username`, `secret`, `user_type_id`, `harsh`, `status`) 
        VALUES ('".$this->get_person_id()."','$this->username','$this->password','$this->user_type_id','$this->harsh','$this->status')";
    }

}