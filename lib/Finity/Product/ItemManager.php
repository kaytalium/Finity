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
        $item->set_item_id('apl-20234');
        return $item;
    }
    
    public function updateItem(String $ItemId) : bool{
        echo '<br>item id: '.$ItemId;
        return true;
    }
    
}