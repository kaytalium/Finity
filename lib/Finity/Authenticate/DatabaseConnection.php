<?php

namespace Finity\Authenticate;

class DatabaseConnection implements \Finity\Authenticate\SQLInterface{

    //Database credentials
    private $host = 'localhost';
    private $user = 'root';
    private $secret = 'root';
    private $databaseName = 'inventory';
    private $port = 8889;

    private $conn; //hold the connection of the database

    /**
     * Establish a connection with the database 
     * @return boolean 
     */
    private function connectToDatabase(){
        $link = mysqli_connect($this->host, $this->user, $this->secret, $this->databaseName, $this->port);
        if(!$link){
            return false;
        }
        else{
            $this->conn = $link;
            return true; 
        }
    }


    /**
     * Update Table Set 
     */
    public function update(String $query){
        if(!$this->isConnectionAndNotEmpty($query)){
            return array('state'=>false, 'msg'=>"No query string or cannot connect to database");
        }

        $this->connectToDatabase();
        return array('state'=>mysqli_query($this->conn, $query));
    }
    
    /**
     * Insert into Table
     */
    public function insert(String $query, $data = false){
        if(!$this->isConnectionAndNotEmpty($query))
        return array('state'=>false,'msg'=>'invalid query or invalide database connection');

        $this->connectToDatabase();
        $result = mysqli_query($this->conn, $query);
        $id = $this->conn->insert_id;
        mysqli_close($this->conn);
        return $id;
        
    }

    /**
     * Select * from Table
     * @return array [state, msg/data] if false then msg else data
     */
    public function select(String $query){
        $datasetResult = array();
        $i = 0;
        $rows = null;
        $isResult = false;
        
        if(!$this->isConnectionAndNotEmpty($query))
        return array('state'=>$isResult,'msg'=>'invalid query or invalide database connection');
        
        $this->connectToDatabase();
        $result = mysqli_query($this->conn, $query);
        if($result)
        $rows = mysqli_num_rows($result);
        
        if($rows){
            $isResult = true;
            while($row = mysqli_fetch_array($result)){
                $datasetResult[$i] = $row;
                $i++;
            }
        }

        mysqli_close($this->conn);

        return array('state'=>$isResult, 'data'=>$datasetResult);
       
    }

    /**
     * Delete From Table_name WHERE 
     */
    public function delete(String $query){
        if(!$this->isConnectionAndNotEmpty($query))
        return array('state'=>false,'msg'=>'invalid query or invalide database connection');

        $this->connectToDatabase();
        $result = mysqli_query($this->conn, $query); 
        mysqli_close($this->conn);
        return $result;
    }

    /**
     * Validate the connection and empty string
     */
    private function isConnectionAndNotEmpty($query){

        if(!isset($query) || Empty($query)  && !$this->connectToDatabase()){
            return false;
        }else{
            return true;
        }
        
    }
}

