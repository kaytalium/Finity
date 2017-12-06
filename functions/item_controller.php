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
        $cleanData = cleanPostDataFromUser(unserialize(ITEM_ATTRIBUTES));
        $btn = $_POST['button'];
        print_ra($_POST);
        if($btn=="Cancel"){
            header('Location: ../product.php');
            return;
        }
           
        $im = new \Finity\Product\ItemManager;

        $item = new \Finity\Product\Item($cleanData);
        $item->set_item_id('');
        echo 'Item id: '.$item->get_item_id();

        $item = $im->createNewItem($item);

        if(!empty($item->get_item_id()))
            echo 'Your item was created successfully';
        else
            echo "There was a problem creating your item";
        header('Location: ../product.php?c='.$item->get_item_id().'&v=itemreq');
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
