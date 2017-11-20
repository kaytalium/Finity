<?php

namespace Finity\Authenticate;

interface SQL{

    /**
     * This function should allow the user to update and field/s in the database
     * @param will accept the query string
     * 
     */
    public function update($arg = array());

    public function insert($arg = array());

    public function select($arg = array());

    public function delete($arg = array());
}