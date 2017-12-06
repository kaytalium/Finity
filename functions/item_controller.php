<?php ob_start();
    //include Finity library 
    include '../lib/Finity/Autoloader.php';
    define('ITEM_ATTRIBUTES', serialize(array(
        "description"   =>"",
        "unit"          =>"",
        "price"         =>"",
        "item_id"       =>"",
        "name"          =>"",
        "category"      =>"",
        "type"          =>"",
    )));

    $requester = (isset($_GET['v'])?$_GET['v']:'');

switch($requester){
    case 'update':
    updateProduct();
    break;

    case 'create':
    createProduct();
    break;

    default:
    header('Location: ../product.php');


}
    /**
     * Create new product function
     */
    function createProduct(){

    }

    /**
     * Update product function
     */
    function updateProduct(){
        $cleanData = cleanPostDataFromUser(unserialize(ITEM_ATTRIBUTES));
        
        $im = new \Finity\Product\ItemManager;
        $item = new \Finity\Product\Item($cleanData);

        $im->updateItem($item);

        if($im->updateItem($item))
            echo 'Item updated';
        else
            echo 'Item was not updated';
        header('Location: ../product.php?c='.$item->get_item_id().'&v=itemreq');
    }
