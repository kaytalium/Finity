<?php

namespace Finity\Product;

class Item{

    //private vars
    private $item_id = null;
    private $description = null;
    private $unit = null;
    private $price = null;
    private $name = null;//[Basketball, Apple]
    private $category = null;//[Sports, fruits]
    private $type = null;//[Spalding, Jamaican ],
    private $imageUrl = null;

    public function __construct($arg = array()){
        $this->description  = (isset($arg['description'])?$arg['description']:'');
        $this->unit         = (isset($arg['unit'])?$arg['unit']:'');
        $this->price        = (isset($arg['price'])?$arg['price']:'');
        $this->item_id      = (isset($arg['item_id'])?$arg['item_id']:'');
        $this->name         = (isset($arg['name'])?$arg['name']:'');
        $this->category     = (isset($arg['category'])?$arg['category']:'');
        $this->type         = (isset($arg['type'])?$arg['type']:'');
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

    public function get_all(){
        setlocale(LC_MONETARY, 'en_US');
        return array(
            'item_id'       => $this->item_id,
            'description'   => $this->description,
            'unit'          => $this->unit,
            'price'         => $this->price,
            'format_price'  => money_format('%n',$this->price),
            'name'          => $this->name,
            'category'      => $this->category,
            'type'          => $this->type
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

    //Public class functions

    public function preparedUpdateQueryString($paramArray){
        return $this->updateQueryString($paramArray);
    }

    public function preparedInsertQueryString(){
        return "INSERT INTO `item`  (`description`,`unit`,`price`,`name`,`category`,`type`) 
        VALUES('$this->description','$this->unit','$this->price','$this->name','$this->category','$this->type')";
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
            return "UPDATE `item` SET `description`='$this->description', `unit`='$this->unit', `price`='$this->price',
            `name`='$this->name', `category`='$this->category', `type`='$this->type' WHERE `item_id`='$this->item_id'";
        }
    }

}
