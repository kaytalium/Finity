<?php
    //at this point we need the id for the item we wish to display 
    //to pass in the function that will return an item object
    $detailItem = new \Finity\Product\Item;
    $detailItem->set_description('');
    $showEdit = ($itemid ==-1?true:false);

    if(!$showEdit)
    $detailItem = $prolist->getItem($itemid);
?>
<div class="catalog-container">
    <div class="goback"> 
        <a href="<?php echo $_SERVER["PHP_SELF"].'?&v=catreq';?>">
            <i class="fa fa-angle-double-left" aria-hidden="false"> Go back to List</i>
        </a>
    </div>
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
                    <p>Quantity: <?php echo $detailItem->get_unit(); ?></p>
                </div> 
            
                <div class="display_type">
                    <p>Type: <?php echo $detailItem->get_type(); ?></p>        
                </div> 
                <button class="btn" id="edit-btn">Edit</button>
            </div>
        </div>

        <div class="edit_info <?php echo ($showEdit?'show':''); ?>">
            <form action="functions/item_controller.php?v=<?php echo ($showEdit?'create':'update'); ?>" method="POST">
                <input type="text" value="<?php echo $itemid; ?>" hidden="hidden" name="item_id">
                <div class="row">
                    <div class="edit_cat">
                        <label for="category">Category</label>
                        <select required="required" name="category">
                            <option value="" hidden>--Category--</option>
                            <?php
                                $clist = $prolist->getCategories();
                                foreach($clist as $cat){
                                    if($cat === $detailItem->get_category())
                                        $selected = "selected";
                                    else
                                        $selected = "";
                                    echo '<option value="'.$cat.'" '.$selected.'>'.$cat.'</option>';
                                }
                            
                            ?>
                        </select>

                    </div>
                    
                    <div class="edit_name">
                        <label for="name">Item Name</label>
                        <input required class="input" type="text" name="name" placeholder="Enter Item Name"; value="<?php echo $detailItem->get_name(); ?>"/>
                    </div>

                    <div class="edit_description">
                        <label for="description">Description</label>
                        <textarea class="textarea" maxlength=250 required  name="description" placeholder="Enter item Description"><?php echo $detailItem->get_description(); ?></textarea>
                    </div>

                    <div class="edit_price">
                        <label for="price">Price</label>
                        <input required class="input" type="number" name="price" placeholder="Enter the Price"; value="<?php echo $detailItem->get_price(); ?>"/>
                    </div>

                    <div class="edit_unit">
                        <label for="unit">Unit</label>
                        <input required class="input" type="number" name="unit" placeholder="Enter your Unit"; value="<?php echo $detailItem->get_unit(); ?>"/>
                    </div>

                    <div class="edit_type">
                        <label for="type">Type</label>
                        <input required class="input" type="text" name="type" placeholder="Enter a Type"; value="<?php echo $detailItem->get_type(); ?>"/>
                    </div>
                </div>

                <div class="row">
                    <input type="submit" name="button" class="btn" value="Save"/>
                    <input type="submit" class="btn bg-red" name="button" value="Cancel" id=" <?php echo ($showEdit?'':'cancel-btn'); ?>"/>
                </div>
            </form>
        </div>
        
        
    </div> 

</div>

