<?php 
    include 'item_profile.php'; 
    $itemList= $prolist->getItems(array('category'=>$selectedCat));

?>

<div class="list-of-items">
<?php 
foreach($itemList as $key=>$item)
{
    echo item_profile($item);
}
?>
</div> 