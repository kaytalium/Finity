<?php
//at this point we need the id for the item we wish to display 
//to pass in the function that will return an item object
$detailItem = new \Finity\Product\Item;
$detailItem->set_description('');
$showEdit = ($itemid ==-1?true:false);

if(!$showEdit)
$detailItem = $prolist->getItem($itemid);

$sw = (isset($_SESSION['searchWord'])?$_SESSION['searchWord']:'');
$s  = (isset($_GET['s'])?$_GET['s']:'');

?>
<div class="catalog-container">
    <?php
    if($s){
        echo '<div class="goback"> 
        <a href="search.php?&searchbox='.$sw.'">
            <i class="fa fa-angle-double-left" aria-hidden="false"> Go back to search result</i>
        </a>
    </div>';
    }else{
        echo '<div class="goback"> 
        <a href="'.$_SERVER["PHP_SELF"].'?&v=catreq">
            <i class="fa fa-angle-double-left" aria-hidden="false"> Go back to List</i>
        </a>
    </div>';
    }

    ?>
    <!--left side of the container with Image-->
    <div class="left">
        <div class="imgebox">
            <img  src= "image/<?php echo $detailItem->get_image_url(); ?>" alt="<?php echo $detailItem->get_name();?>">
            <span class="">Change Image</span>
        </div>
    </div>

    <!-- Right side of the container with description-->

    <div class="right"> 
            <div class="mini_menu">
                <ul id="mini_menu_ul">
                    <li class="active">Product Detail</li>
                    <li>Reduce Stock</li>
                    <li>Update Stock</li>
                </ul>
            </div>

            <div id="product_detail" class="product_detail">
                <?php include 'e_product_detail.php';?>
            </div>
    
            <div id="reduce_stock" class="reduce_stock hide">
                <?php include 'e_reduce_stock.php'; ?>
            </div>

            <div class="update_stock hide" id="update_stock">
                <?php include 'e_update_stock.php'; ?>
            </div>
        
    </div>

</div>

<script src="js/edit_details-controller.js"></script>