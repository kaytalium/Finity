<?php
//This is the system test environment 
//Test all your classes and functions here before implementation 
$user = new \Finity\Profile\User(array("username"=>"heslopok",'password'=>"admin"));
$Oauth = new \Finity\Authenticate\Oauth($user);
echo $Oauth->test();

$im = new \Finity\Product\ItemManager();
$newItem = $im->createNewItem(new \Finity\Product\Item(array('description'=>"Washing Machine")));
echo '<br>New Item: '.$newItem->get_description();
//print_r($newItem);

echo '<br>Update item: '.$im->updateItem($newItem->get_item_id());