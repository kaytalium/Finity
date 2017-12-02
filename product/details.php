<?php
    //at this point we need the id for the item we wish to display 
    //to pass in the function that will return an item object
    $detailItem = $prolist->getItem($itemid);
?>
<div class="catalog-container">
    <div class="goback"> <a href=""><< Go back to List</a></div>
    <!--left side of the container with Image-->
    <div class="left">
        <div class="imgebox">
            <img  src= "image/<?php echo $detailItem->get_image_url(); ?>" alt="<?php echo $detailItem->get_name();?>">
        </div>
    </div>

    <!-- Right side of the container with description-->
    
    <div class="right"> 
        <div class="row topmost">
            <span><?php echo $detailItem->get_category(); ?></span>
            <div id="name">
                <p>
                    <?php echo $detailItem->get_name(); ?>
                </p>
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </div> 
            <div id="edit_name">
                <input type="text" name="name" placeholder="Enter a name"; value="<?php echo $detailItem->get_name(); ?>"/>
                <i class="fa fa-check-circle fa-2x" aria-hidden="true"></i>
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
            </div>
        </div> 
                        
        <div class="row"> 
            <div id="descript">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                <p><?php echo $detailItem->get_description(); ?></p> 
            </div>
        </div>
                    
        <div class="row">
            <div id="price"><i class="fa fa-pencil" aria-hidden="true"></i>
                <p>Price: <?php echo $detailItem->get_formatted_price(); ?></p>
            </div> 
        </div>

        <div class="row">
            <div id="quan"><i class="fa fa-pencil" aria-hidden="true"></i>
                <p>Quantity: <?php echo $detailItem->get_unit(); ?></p>
            </div> 
       </div> 
       <div class="row">
            <div id="type"><i class="fa fa-pencil" aria-hidden ="true"></i> 
                <p>Type: <?php echo $detailItem->get_type(); ?></p>        
            </div> 
        </div>
        <div class="row">
            <a href = "#" class="btn">Update</a>
        </div>
    </div> 

</div>