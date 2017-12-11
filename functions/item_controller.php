<?php ob_start();
    //include Finity library 
    include '../lib/Finity/Autoloader.php';
    print_ra($_POST);
    define('ITEM_ATTRIBUTES', serialize(array(
        "description"   =>"",
        "price"         =>"",
        "item_id"       =>"",
        "name"          =>"",
        "category"      =>"",
        "new_category"  =>"",
        "edit_category" =>"",
        "type"          =>"",
        "maximum"       =>"",
        "minimum"       =>""
    )));

    //
    //constant for update stock
    define('UPDATE_STOCK_ATTRIBUTES', serialize(array(
        "item_id"       =>"",
        "purchase_date" =>"",
        "supplier"      =>"",
        "purchase_price"=>"",
        "unit"          =>""
    )));

    $requester = (isset($_GET['v'])?$_GET['v']:'');
    $opt =(isset($_GET['opt'])?$_GET['opt']:'');

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
        $opt =(isset($_GET['opt'])?$_GET['opt']:'');

        switch($opt){
            case 'product_detail':
                $data = cleanPostDataFromUser(unserialize(ITEM_ATTRIBUTES));

                $category = array_filter($data, function($v, $k){
                    return $k =="new_category" && !empty($v) || $k == "category" || $k == "edit_category" && !empty($v);                
                }, ARRAY_FILTER_USE_BOTH);

                
                $filter = array_filter($data, function($k){
                    return $k !=="new_category" && $k !=="category";
                }, ARRAY_FILTER_USE_KEY);

            
                $im = new \Finity\Product\ItemManager;
                $item = new \Finity\Product\Item($filter);
        
                $res = $im->updateItem($item);
        
                if($res)
                    echo 'Item updated';
                else
                    echo 'Item was not updated';

                //Item detail update we now update the category if it was changed or new Category
                print_ra($category);
                if(count($category)>1){
                    if(array_key_exists('new_category',$category)){
                        $res = $im->addNewCategory($category['new_category'], $item->get_item_id());
                        
                        echo ($res?'Added successfully':'Adding error');
                    }

                    if(array_key_exists('edit_category',$category)){
                        $res = $im->editCategory($category);

                        echo ($res?'Edit successfully':'edit error');
                    }
                }else{
                    //update the category
                    $res = $im->updateCategory($category['category'], $item->get_item_id());
                    
                    echo ($res?'update successfully':'Update error');
                }
                header('Location: ../product.php?c='.$item->get_item_id().'&v=itemreq');

            break;

            case 'update_stock':
                $cleanUpData = cleanPostDataFromUser(unserialize(UPDATE_STOCK_ATTRIBUTES));
                $im = new \Finity\Product\ItemManager;
                //now that our data is clean 
                //we can now create each unit with their unique id
                for($i=0; $i<$cleanUpData['unit'];$i++){
                    $cleanUpData['model_id'] = bin2hex(random_bytes(3)).'-'.$cleanUpData['item_id'];
                    //print_ra($cleanUpData);
                    $res = $im->createItemModel($cleanUpData);
                    echo '<br>';
                    echo (isset($res)?'New Items Added successfully':'There was problem update new items');
                }
                header('Location: ../product.php?c='.$cleanUpData['item_id'].'&v=itemreq');
            break;
        }
        
    }
