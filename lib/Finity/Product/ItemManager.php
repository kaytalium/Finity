<?php
declare(strict_types=1);

namespace Finity\Product;

/**
 * This class handle all the transaction that occur on a item 
 * between database and interface
 */
class ItemManager extends \Finity\Authenticate\DatabaseConnection  implements \Finity\Product\UserRequestInterface{

    public function __construct(){
        
    }
    /**
     * how to use this function 
     * $im = new ItemManager();
     * $newItem = $im->createNewItem(new Item(array("name"=>"Basketball")))
     */
    public function createNewItem(Item $item) : Item{
        $id = $this->insert($item->preparedInsertQueryString(), true);
        $data = $this->select($this->prepare(array("item_id"=>$id)));
        
        return new Item($data['data'][0]);
    }
    
    /**
     * Update an item from the user and return bool state
     */
    public function updateItem(Item $Item, $paramArray = array()) : bool{
        $result = $this->update($Item->preparedUpdateQueryString($paramArray));
        
        //Do something with the result from the request
        if($result['state'])
            return true;
        else
            return false;
    }

    /**
     * Deleting an item 
     */
    public function deleteItem(Item $item) : bool{
        return $this->delete($item->preparedDeleteQueryString());    
    }

    /**
     * Get one item from the database base on item_id given by user
     */
    public function getItem(String $itemID){

    }

    /**
     * Returen a list of items form the database
     */
    public function getItems($arr = array()){
        //initialize vars
        $list = array();
        $i = 0;

        //Prepare the query statement with the user request if given or return default
        $query = $this->prepare($arr);

        //Get the result array from the database 
        $result = $this->select($query);

        //Check to see if result and if yes loop over result and assign to class and return
        //else return empty array
        if($result['state']){
            foreach($result['data'] as $Item){
                $list[$i] = new Item($Item);
                $i++;
            }
        }
        return $list;        
    }

    /**
     * This function will get all the categories from the system based on the items in the database
     */
    public function getCategories() : Array{
        //initialize vars
        $list_category = array();
        $i=0;

        //Get the category query from the 
        $query = "SELECT DISTINT category FROM items";

        $result = $this->query($query);

        //Check to see if result, if true the prepare an array for return; else return enpty array
        if($result['state']){
            foreach($result['data'] as $category){
                $list_category[$i] = $category;
                $i++;
            }
        }

        return $list_category;
    }

    /**
     * Prepare the get all query statement with optional columns
     */
    private function prepare($paramArray){
        if(!empty($paramArray)){
            $q = 'SELECT * FROM item Where ';
            $count = count($paramArray);
            $i = 1;
            
            foreach(array_keys($paramArray) as $key){
                $q .= "`".$key."`='".$paramArray[$key]."'";

                if($count>1 && $i<$count)
                    $q .=' AND ';
                
                $i++;
            }
            return $q;
        }else{
            return "SELECT * FROM item";
        }
    }
    
}