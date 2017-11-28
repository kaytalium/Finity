<?php

namespace Finity\Profile;

class ProfileManager extends \Finity\Authenticate\DatabaseConnection implements UserRequestInterface{

    public function __construct(){

    }

    /**
     * All persons of the system is a user, since the user class extends a person 
     * we will then load the user construct with the new person information
     */
    public function createNewPerson(Item $user) : User{
        
    }
    
       
    public function updatePerson(String $ItemId) : bool{

    }

    public function createNewUser(User $user) : User{

    }

    public function updateUser(String $userId) : bool{

    }

    public function suspenUser(String $userId) : bool{

    }

    public function test(){
        echo '<br>Hello';
    }
}