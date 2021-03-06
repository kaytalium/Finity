<?php

namespace Finity\Profile;

interface UserRequestInterface{

    /**
     * Create a new record in the item table
     * this function check to ensure that no duplication of item is recorded
     * @param Item this is the item class with an optional construct to accept all details of an item
     * @return Item this is the same class been return to the calling function
     */
    public function createProfile(User $user) : User;

    /**
     * Update an existing record in the item table
     * this function will update any data in the item for any field 
     * @param accept the item ID as a string therefore all non-string datatype will need to be converted
     * @return boolean this will tell if process was successful or failed
     */
    public function updateUser(User $user) : bool;


    public function deleteUser(String $personId) : bool;

    public function suspendUser(String $personId, String $status) : bool;

}