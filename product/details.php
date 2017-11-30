<?php
    //at this point we need the id for the item we wish to display 
    //to pass in the function that will return an item object
    $detailItem = $prolist->getItem($itemid);
?>
<div class="catalog-container">
    <!--left side of the container with Image-->
    <div class="left">
        <div class="imgebox">
            <img  src= "image/<?php echo $detailItem->get_image_url(); ?>" alt="Dog">
        </div>
    </div>

    <!-- Right side of the container with description-->
    
    <div class="right"> 
        <div class="row topmost">
            <span><?php echo $detailItem->get_category(); ?></span>
            <div id="name"><i class="fa fa-pencil" aria-hidden="true"></i>
                <h3><?php echo $detailItem->get_name(); ?></h3>
            </div> 
        </div> 
                        
        <div class="row"> 
            <div id="descript"><i class="fa fa-pencil" aria-hidden="true"></i>
                
                <p><?php echo $detailItem->get_description(); ?></p> 
            </div>
        </div>
                    
        <div class="row">
            <div id="price"><i class="fa fa-pencil" aria-hidden="true"></i>
                <h3><?php echo $detailItem->get_formatted_price(); ?></h3>
            </div> 
        </div>

        <div class="row">
            <div id="quan"><i class="fa fa-pencil" aria-hidden="true"></i>
                <h3>Quantity: <?php echo $detailItem->get_unit(); ?></h3>
       </div> 
       <div class="row">
            <div id="type"><i class="fa fa-pencil" aria-hidden ="true"></i> 
            <h3>Type: <?php echo $detailItem->get_type(); ?></h3>        
           <div>
                <a href = "#" class="btn">Update</a>
            </div> 
        </div>
    </div> 

</div>