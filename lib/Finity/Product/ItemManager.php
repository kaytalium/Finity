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
        //$Item->preparedUpdateQueryString($paramArray);
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
    public function getItem(String $itemID): Item{
        if(!empty($itemID)){
            //get the item query for an single item
            $query = $this->prepare(array("item_id"=>$itemID));

            //Request from db
            $result = $this->select($query);

            //return result
            if($result['state']){
                return new Item($result['data'][0]);
            }

        }
        
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
        $query = "SELECT DISTINCT category FROM item";

        $result = $this->select($query);

        //Check to see if result, if true the prepare an array for return; else return enpty array
        if($result['state']){
            foreach($result['data'] as $category){
                $list_category[$i] = $category[0];
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

    private function prepareAdhocReport($paramArray){
        if(!empty($paramArray)){
            $q = 'SELECT * FROM item Where ';
            $arg = array_filter($paramArray,function($k){
                return $k == "unit" || $k =="price" || $k =="name" || $k == "category";
            }, ARRAY_FILTER_USE_KEY);

            $count = count($arg);
            $i = 1;
            
            foreach($arg as $key=>$value){

                switch($key){
                    case "name":
                    case "category":
                        $q .= "`".$key."` LIKE '%".$value."%'";
                    break;

                    case "price":
                        $q .= "`".$key."`".$paramArray['price_logic']."'".$value."'";
                    break;

                    case "unit":
                        $q .= "`".$key."`".$paramArray['unit_logic']."'".$value."'";
                    break;
                }

                if($count>1 && $i<$count)
                    $q .=' AND ';
                
                $i++;
            }
            return $q;
        }
    }

    /**
     * Search Result function
     */
    public function getSearchResult($criteria){

        $list = array();
        $i = 0;

        $search_exploded = explode ( " ", $criteria ); 
        $x = 0; 
        $construct = ""; 

        foreach( $search_exploded as $search_each ){
             $x++; 
             
             
             if($x==1){
                $construct .="`name` LIKE '%$search_each%'"; 
             }else{
                $construct .="AND `name` LIKE '%$search_each%'"; 
             }

             $construct .="OR `category` LIKE '%$search_each%'"; 
                
        }
        
        $construct = " SELECT * FROM `item` WHERE $construct ";

        //echo $construct;
        $res = $this->select($construct);

        if($res['state']){
            foreach($res['data'] as $Item){
                $list[$i] = new Item($Item);
                $i++;
            }
        }
        return $list;
        
        
        
    }

    /**
     * 
     */
    public function adhocReport($arg = array()){
        $query = $this->prepareAdhocReport($arg);
        //print_ra($query);
        $result  = $this->select($query);

        return $result;
    }
    
    
}