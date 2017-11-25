<?php
/**
 * Inventory Management Test Environment
 */

 /**
  * Item Manager 
  * This allow the user to iteract with the database and an Item 
  * Creating the manager
  */
$im = new \Finity\Product\ItemManager();

/**
 * Creating a newItem to be stored in the database
 */
$item = new \Finity\Product\Item(array(
    "item_id"=> null,
    "description"=>"Washing Machine",
    "unit"=>32,
    "price"=>89598.98,
    "name"=> 'Samsung',//[Basketball, Apple]
    "category"=>"Appliance", //[Sports, fruits]
    "type"=> 'Kitchen Appliance'//[Spalding, Jamaican ]
));

/**
 * Using the manager to create an item it the database
 * the function accept and item class return an Item class with additional info, 
 * at this point you can perform some action
 */
//$item = $im->createNewItem($item);


/**
 * Print out the information from item class after 
 * it returns from the database
 */
echo "--------------------------<br>New Item<br>--------------------------";
foreach ($item->get_all() as $key => $value) {
    echo '<br>'.$key.": ".$value;
}

/**
 * Getting a list of all item in the database 
 * first argument optional for specific field if use look like this
 * array("type"=>"appliances")
 */
//$itemList = $im->getItems(array("category"=>"Sport"));
$itemList = $im->getItems();
echo '<br><br>----------------------------<br>List of All Items<br>----------------------------<br>';
echo 'Number of item return '.count($itemList)."<br>";
foreach($itemList as $key=>$item){
    echo "<br>Item ".($key+1)."<br>____________________";
    foreach ($item->get_all() as $key => $value) {
        echo '<br>'.$key.": ".$value;
    }
    echo "<br>";
}



/**
 * Updating the item 
 */
echo "<br><br>--------------------------<br>Updating Items<br>--------------------------<br>";
$itemList[0]->set_name('Foot Baller');
// if($im->updateItem($itemList[0], array("type"=>"rubber")))
//     echo 'Item updated successfully';
// else
//     echo "there was a problem updating your record";


/**
 * Delete Record from 
 */
echo "<br><br>--------------------------<br>Deleting an Items<br>--------------------------<br>";
// if($im->deleteItem($itemList[17]))
//     echo 'Item delete successfully';
// else
//     echo 'Unable to delete Item';


