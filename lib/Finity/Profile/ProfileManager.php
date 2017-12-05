<?php

namespace Finity\Profile;

class ProfileManager extends \Finity\Authenticate\DatabaseConnection implements UserRequestInterface{

    public function __construct(){

    }

    /**
     * All persons of the system is a user, since the user class extends a person 
     * we will then load the user construct with the new person information
     */
    public function createProfile(User $user) : User{
        //we must first check to see if the username already exist
        $userQuery = "SELECT `person_id` FROM user WHERE `username`='".$user->get_username()."'";
        
        $userResult = $this->select($userQuery);

        if(!$userResult['state']){
            //This mean this username is not in the database
            //therefore we can go ahead and create a new person
            $user->set_person_id($this->insert($user->personCreateQueryString()));

            //not that we have the person id that was just created 
            //we can go ahead and setup the user for creation

            //Create the harsh and encrypt password
            $Oauth = new \Finity\Authenticate\Oauth($user);
            $user = $Oauth->encrypt_password();
            
            //Create user and return new user_id
            $user->set_user_id($this->insert($user->userCreateQueryString()));
        }

        return $user;
    }
    
       
    public function updatePerson(String $ItemId) : bool{

    }

    public function createNewUser(User $user) : User{

    }

    public function deleteUser(String $userId) : bool{

        $query = "DELETE FROM user WHERE `person_id`='$userId'";
        $this->delete($query);

        $deqry= "DELETE FROM person WHERE 'person_id'='$userId'";

        return true;
        
    }

    public function suspendUser(String $personId, String $status) : bool{
            $status = ($status==0?1:0);
            $upqry= "UPDATE user  SET `status`='$status' WHERE `person_id`='$personId' ";
             $result = $this->update($upqry);
             echo 'Hello';
             print_ra($result);
             return true;
    }

    public function getAllUsers():array{
        $listofUsers = array();
        $i=0;
        //get the query string for all users in the db
        $allUsersQueryString = "SELECT `u`.`person_id`,`username`, `type`, `status`, `firstname`, `lastname` 
        FROM `user` `u`, `person` `p`, `user_type` `ut` WHERE `u`.`user_type_id`=`ut`.`user_type_id` 
        AND `p`.`person_id`=`u`.`person_id`";

        $result = $this->select($allUsersQueryString);
        
        if($result['state'])
            foreach($result['data'] as $user){
                //print_ra($user);
                $listofUsers[$i] = new User($user);
                $i++;
            }
        
        return $listofUsers;
    }

   
}