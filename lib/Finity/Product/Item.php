<?php

namespace Finity\Product;

class Item{

    //private vars
    private $item_id = null;
    private $description = null;
    private $price = null;
    private $name = null;//[Basketball, Apple]
    private $category = null;//[Sports, fruits]
    private $type = null;//[Spalding, Jamaican ],
    private $imageUrl = null;
    private $max = null;
    private $min = -1;
    private $quantityOnHand= null;

    public function __construct($arg = array()){
        $this->description      = (isset($arg['description'])?$arg['description']:'');
        $this->unit             = (isset($arg['unit'])?$arg['unit']:'');
        $this->price            = (isset($arg['price'])?$arg['price']:'');
        $this->item_id          = (isset($arg['item_id'])?$arg['item_id']:'');
        $this->name             = (isset($arg['name'])?$arg['name']:'');
        $this->category         = (isset($arg['category'])?$arg['category']:'');
        $this->type             = (isset($arg['type'])?$arg['type']:'');
        $this->imageUrl         = (isset($arg['image_url'])?$arg['image_url']:'');
        $this->max              = (isset($arg['maximum'])?$arg['maximum']:'');
        $this->min              = (isset($arg['minimum'])?$arg['minimum']:'');
        $this->quantityOnHand   = (isset($arg['quantity_on_hand'])?$arg['quantityOnHand']:'');
    }

    //Getters
    public function get_description(){
        return $this->description;
    }

    public function get_unit(){
        return $this->unit;
    }

    public function get_price(){
        return $this->price;
    }

    public function get_item_id(){
        return $this->item_id;
    }

    public function get_image_url(){
        return $this->imageUrl;
    }
    
    public function get_name(){
        return $this->name;
    }

    public function get_category(){
        return $this->category;
    }

    public function get_type(){
        return $this->type;
    }

    public function get_maximum(){
        return $this->max;
    }

    public function get_minimum(){
        return $this->min;
    }

    public function get_formatted_price(){
        if(isset($this->price) && !empty($this->price)){
            return toMoney($this->price);//money_format('%n',$this->price);
        }else{
            return toMoney();
        }
    }

    public function get_quantity_on_hand(){
        return $this->quantityOnHand;
    }

    public function get_all(){
        return array(
            'item_id'       => $this->item_id,
            'description'   => $this->description,
            'price'         => $this->price,
            'format_price'  => toMoney($this->price),
            'name'          => $this->name,
            'category'      => $this->category,
            'type'          => $this->type,
            'image_url'     => $this->imageUrl,
            'maximum'       => $this->max,
            'minimum'       => $this->min
        );
    }

    //Setters
    public function set_item_id($item_id){
         $this->item_id = $item_id;
    }

    public function set_description($desc){
         $this->descrition = $desc;
    }

    public function set_unit($unit){
         $this->unit = $unit;
    }

    public function set_price($price){
         $this->price = $price;
    }

    public function set_name($name){
        $this->name = $name; 
    }

    public function set_category($cat){
        $this->category= $cat;
    }

    public function set_type($type){
        $this->type = $type;
    }

    public function set_maximum($max){
        $this->max = $max;
    }

    public function set_min($min){
        $this->min = $min;
    }

    public function set_quantity_on_hand($qty){
        $this->quantityOnHand = $qty;
    }
    

    //Public class functions

    public function preparedUpdateQueryString($paramArray){
        //print_ra($this->updateQueryString($paramArray));
        return $this->updateQueryString($paramArray);
    }

    public function preparedInsertQueryString(){
        return "INSERT INTO `item`  (`description`,`unit`,`price`,`name`,`category`,`type`, `maximum`, `minimum`) 
        VALUES('$this->description','$this->unit','$this->price','$this->name','$this->category','$this->type','$this->max','$this->min')";
    }

    public function preparedDeleteQueryString(){
        return "DELETE FROM `item` WHERE `item_id`='$this->item_id'";
    }

    //Private class functions

    private function updateQueryString($paramArray){
        if(!empty($paramArray)){
            $q = "UPDATE item SET ";
            $count = count($paramArray);
            $i = 1;
            
            foreach(array_keys($paramArray) as $key){
                $q .= "`".$key."`='".$paramArray[$key]."'";

                if($count>1 && $i<$count)
                    $q .=', ';
                
                $i++;
            }
            return $q .=" Where `item_id`='".$this->item_id."'";
        }else{
            return "UPDATE `item` SET `description`='$this->description', `price`='$this->price',
            `name`='$this->name', `type`='$this->type', `maximum`='$this->max', `minimum`='$this->min' WHERE `item_id`='$this->item_id'";
        }
    }

    public function prepareQuntityOnHandQueryString(){
        return "SELECT count(`product_id`)as 'quantity_on_hand' FROM `product` WHERE `sold`='false' AND `item_id`='$this->item_id'";
    }

}
