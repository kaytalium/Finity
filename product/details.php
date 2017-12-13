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
        </div>
    </div>

    <!-- Right side of the container with description-->
    
    <div class="right"> 
        <div class="display_info <?php echo ($showEdit?'hide':''); ?>" id="display_info">
            <div class="row">
                <div class="topmost">
                    <p><?php echo $detailItem->get_category(); ?></p>
                </div>
        
                <div class="display_name">
                    <p><?php echo $detailItem->get_name(); ?></p>
                </div> 
            
                <div class="display_description">
                    <p><?php echo $detailItem->get_description(); ?></p> 
                </div>
            
                <div class="display_price">
                    <p>Price: <?php echo $detailItem->get_formatted_price(); ?></p>
                </div> 
            
                <div class="display_quantity">
                    <p>Quantity: <?php echo $detailItem->get_quantity_on_hand(); ?></p>
                </div> 
            
                <div class="display_type">
                    <p>Type: <?php echo $detailItem->get_type(); ?></p>        
                </div> 
                <a href="<?php echo $_SERVER['PHP_SELF'].'?c='.$detailItem->get_item_id().'&v=edit_itemreq'; ?>" class="btn">Edit</a>
            </div>
        </div>
    </div> 

</div>

