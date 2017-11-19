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
    private $type = null;//[Spalding, Jamaican ]

    public function __construct($arg = array()){
        $this->description = (isset($arg['description'])?$arg['description']:'');
        $this->unit = (isset($arg['unit'])?$arg['unit']:'');
        $this->price = (isset($arg['price'])?$arg['price']:'');
        $this->item_id = (isset($arg['item_id'])?$arg['item_id']:'');
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

    //Setters
    public function set_item_id($item_id){
        return $this->item_id = $item_id;
    }

    public function set_description($desc){
        return $this->descrition = $desc;
    }

    public function set_unit($unit){
        return $this->unit = $unit;
    }

    public function set_price($price){
        return $this->price = $price;
    }


}
