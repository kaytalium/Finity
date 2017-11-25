<?php

namespace Finity\Authenticate;

interface SQLInterface{

    /**
     * This function should allow the user to update and field/s in the database
     * @param will accept the query string
     * 
     */
    public function update(String $query);

    public function insert(String $query);

    public function select(String $query );

    public function delete(String $query);
}