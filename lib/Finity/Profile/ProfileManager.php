<?php

namespace Finity\Profile;

class ProfileManager extends Finity\Authenticate\DatabaseConnection implements UserRequestInterface{

    public function __construct(){

    }

    public function createNewPerson(Item $person) : Person{

    }
    
       
    public function updatePerson(String $ItemId) : bool{

    }

    public function createNewUser(User $user) : User{

    }

    public function updateUser(String $userId) : bool{

    }
}