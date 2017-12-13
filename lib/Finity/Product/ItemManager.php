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
        $id = $this->insert($item->preparedInsertQueryString());
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
                $item = new Item($result['data'][0]);
                $item->set_quantity_on_hand($this->getQuantityOnHand($item->prepareQuntityOnHandQueryString()));
                return $item;
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
                 $item = new Item($Item);
                 $item->set_quantity_on_hand($this->getQuantityOnHand($item->prepareQuntityOnHandQueryString()));
                 $list[$i] = $item;
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
        $query = "SELECT `category`,`category_id` FROM `item_category`";

        $result = $this->select($query);
        
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
            $q = 'SELECT * FROM `item` `i`, `item_category` `ic` WHERE `i`.`category_id`=`ic`.`category_id` AND ';
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
            return "SELECT * FROM `item` `i`, `item_category` `ic` WHERE `i`.`category_id`=`ic`.`category_id`";
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
    public function addNewCategory($new_cat, $item_id){
        //We must first check to see if category already in database
        $sel_query = "SELECT * FROM `item_category` WHERE `category`='$new_cat'";
        $sel_res = $this->select($sel_query);
        if(!$sel_res['state']){
            $query = "INSERT INTO `item_category` (`category`) VALUES ('$new_cat')";
            $id = $this->insert($query);
            echo 'Id: '.$id;

            //we now need to update the current item with the new category
            $up_item_query = "UPDATE `item` SET `category_id`='$id' WHERE `item_id`='$item_id'";
            $res = $this->update($up_item_query);

            return $res['state'];

        }else{
            return false;
        }
        

    }

    /**
     * 
     */
    public function createNewCategory($new_cat){
        return $this->insert("INSERT INTO `item_category` (`category`) VALUES ('$new_cat')");
    }

    /**
     * 
     */
    public function editCategory($arg = array()){
        if(!empty($arg)){
            $query = "UPDATE `item_category` SET `category`='".$arg['edit_category']."' WHERE `category_id`='".$arg['category_id']."'";
            $res = $this->update($query);

            return $res['state'];
        }
    }

    /**
     * Update Category from the item edit
     */
    public function updatecategory($category, $item_id){
        $res = $this->select("SELECT `category_id` FROM `item_category` WHERE `category`='$category'");
       
        if($res['state']){
            $update_res = $this->update("UPDATE `item` SET `category_id`='".$res['data'][0]['category_id']."' WHERE `item_id`='$item_id'");

            return $update_res['state'];
        }
    }


    /**
     * Creating new Item Models
     */
    public function createItemModel($arg = array()){
        //query to input produce
        $query = "INSERT INTO `product` (`model_id`, `item_id`, `purchase_date`, `purchase_price`)
        VALUES('".$arg['model_id']."','".$arg['item_id']."', '".$arg['purchase_date']."', '".$arg['purchase_price']."')";

        //query to link product to supplier
        $supplier_query = "INSERT INTO `item_supplier` (`item_id`,`supplier_id`,`model_id`) VALUES('".$arg['item_id']."', '".$arg['supplier_id']."', '".$arg['model_id']."')";
        echo $supplier_query;
        if(!empty($arg)){
            $res = $this->insert($query);
            $sres = $this->insert($supplier_query);
            print_ra($res);
            return $res;
        }else{
            return false;
        }

    }


    public function updateSupplier($supplier_id, $new_name){
        $res  =$this->update("UPDATE `supplier` SET `supplier`='$new_name' WHERE `supplier_id`='$supplier_id'");
       
        return $res['state'];
    }

    public function insertNewSupplier($supplier_name){
        $res = $this->insert("INSERT INTO `supplier` (`supplier`) VALUES('$supplier_name')");

        return $res;
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

    private function getQuantityOnHand($query){
        $res = $this->select($query);
        if($res['state'])
            return $res['data'][0]['quantity_on_hand'];
        else
            return 0;
    }
    
    public function getModelList($item_id){
        $query = "SELECT `model_id`, `price` FROM `product` `p`, `item` `i` WHERE `p`.`item_id`='$item_id' AND `p`.`item_id`=`i`.`item_id` AND `p`.`sold`=false";
        $res = $this->select($query);

        if($res['state'])
            return $res['data'];
        else
            return array();
    }

    public function sellProduct($model_id){
        $query = "UPDATE `product` SET `sold`=true WHERE `model_id`='$model_id'";
        $res = $this->update($query);
        return $res['state'];
    }

    /**
     * 
     */
    public function getSupplierList(){
        $res = $this->select("SELECT * FROM `supplier`");

        return $res['data'];
    }
    
}