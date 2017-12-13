<?php ob_start();
    //include Finity library 
    include '../lib/Finity/Autoloader.php';
    print_ra($_POST);
    define('ITEM_ATTRIBUTES', serialize(array(
        "description"   =>"",
        "price"         =>"",
        "item_id"       =>"",
        "name"          =>"",
        "category_id"   =>"",
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
        "supplier_id"   =>"",
        "new_supplier"  =>"",
        "edit_supplier" =>"",
        "purchase_price"=>"",
        "unit"          =>"",
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
        
        //create handler class
        $im = new \Finity\Product\ItemManager;
        
        //get the the category that is coming over that is new, edited or orginal
        $filter_cats = array_filter($cleanData, function($v, $k){
            return $k =="new_category" && !empty($v) || $k == "category_id" || $k == "edit_category" && !empty($v);                
        }, ARRAY_FILTER_USE_BOTH);
        
        $item = new \Finity\Product\Item($cleanData);

        if(count($filter_cats)==1 || count($filter_cats)>1 && isset($filter_cats['edit_category'])){
            $item->set_item_id('');
            $item = $im->createNewItem($item);

            if(!empty($item->get_item_id()))
                echo 'Your item was created successfully';
            else
                echo "There was a problem creating your item";
        }

        if(count($filter_cats)>1 && isset($filter_cats['edit_category'])){
            $resq = $im->editCategory($filter_cats);

            if($resq){
                echo "Category Edited Successfully";
            }else{
                echo "Error in updateing your category";
            }

        }

        if(count($filter_cats)>1 && isset($filter_cats['new_category'])){
            $item->set_item_id('');
            $item->set_category_id($im->createNewCategory($filter_cats['new_category']));
            print_ra($item->get_item_id());
            $item = $im->createNewItem($item);

            if(!empty($item->get_item_id()))
                echo 'Your item was created successfully';
            else
                echo "There was a problem creating your item";
        }
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
                //print_ra($category);
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
                //print_ra($cleanUpData);
                $supplier = array_filter($cleanUpData, function($v, $k){
                    return $k =="new_supplier" && !empty($v) || $k == "supplier_id" || $k == "edit_supplier" && !empty($v);                
                }, ARRAY_FILTER_USE_BOTH);

                
                $filter = array_filter($cleanUpData, function($k){
                    return $k !=="new_supplier" && $k !=="edit_supplier";
                }, ARRAY_FILTER_USE_KEY);

                echo 'filter';
                
                //now that our data is clean 
                //we can now create each unit with their unique id
                $supplier_count = count($supplier);
                if($supplier_count==1 || $supplier_count>1 && isset($supplier['edit_supplier'])){
                    for($i=0; $i<$filter['unit'];$i++){
                        $filter['model_id'] = bin2hex(random_bytes(3)).'-'.$filter['item_id'];
                        $res = $im->createItemModel($filter);

                        echo '<br>';
                        echo (isset($res)?'New Items Added successfully':'There was problem update new items');
                    }
                }

                //if a request for modification of supplier name then change the name
                if($supplier_count>1 && isset($supplier['edit_supplier'])){
                    $resx = $im->updateSupplier($filter['supplier_id'], $supplier['edit_supplier']);

                    echo '<br>';
                    echo (isset($resx)?"Supplier Name update successfully":"There was a problem updating your supplier name");
                }

                //create supplier and update items
                if($supplier_count>1 && isset($supplier['new_supplier'])){
                    //create the new supplier
                    $supp_res = $im->insertNewSupplier($supplier['new_supplier']);

                    if($supp_res){
                        //create the items
                        for($i=0; $i<$filter['unit'];$i++){
                            $filter['model_id'] = bin2hex(random_bytes(3)).'-'.$filter['item_id'];
                            $filter['supplier_id'] = $supp_res;
                            $res = $im->createItemModel($filter);
    
                            echo '<br>';
                            echo (isset($res)?'New Items Added successfully':'There was problem update new items');
                        }
                    }else{
                        echo "There was a problem ";
                    }

                }
                                    
                header('Location: ../product.php?c='.$cleanUpData['item_id'].'&v=itemreq');
            break;

            case 'reduce_stock':
                $cleanData = cleanUnknownKeysFromUser(unserialize(UPDATE_STOCK_ATTRIBUTES));
                $im = new \Finity\Product\ItemManager;
                $e = explode('-', reset($cleanData));
                
                foreach ($cleanData as $id) {
                    $res = $im->sellProduct($id);
                    echo '<br>';
                    echo ($res?'Product sold successfully':'There was problem update product');
                }
                header('Location: ../product.php?c='.$e[1].'&v=itemreq');
            break;
        }
        
    }
