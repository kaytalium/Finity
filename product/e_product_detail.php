<form action="functions/item_controller.php?v=<?php echo ($showEdit?'create':'update'); ?>&opt=product_detail" method="POST">
    <input type="text" value="<?php echo $itemid; ?>" hidden="hidden" name="item_id">
    <div class="row">
        <div class="edit_cat">
            <label for="category">
            Category 
            <i class="fa fa-plus fa edit_plus" id="edit_plus" aria-hidden="true" mytitle="Add New Category"></i>
            <i class="fa fa-pencil fa edit_pencil" id="edit_pencil" aria-hidden="true" mytitle="Edit Category"></i>
            <i class="fa fa-close fa edit_close hide" id="edit_close" aria-hidden="true" mytitle="Close"></i>
            </label>
            <input required="required" type="text" placeholder="Enter new category" name="category" class="input hide" id="it-input-cat" value="empty"/>
            <select required="required" name="category" id="it-cat">
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
            <input required class="input" id="it-name" type="text" 
            name="name" placeholder="Enter Item Name" 
            value="<?php echo $detailItem->get_name(); ?>"/>
        </div>

        <div class="edit_description">
            <label for="description">Description</label>
            <textarea class="textarea" id="it-desc" maxlength=250 required  
            name="description" placeholder="Enter item Description"><?php echo $detailItem->get_description(); ?></textarea>
        </div>

        <div class="edit_price">
            <label for="price">Price</label>
            <input required class="input" id="it-price" type="number" 
            step="0.01" min="0" name="price" placeholder="Enter the Price"
            value="<?php echo $detailItem->get_price(); ?>"/>
        </div>

        <div class="edit_type">
            <label for="type">Type</label>
            <input required id="it-type" class="input" type="text" name="type" placeholder="Enter a Type" 
            value="<?php echo $detailItem->get_type(); ?>"/>
        </div>

        <div class="edit_min">
            <label for="price">Minimum Stock</label>
            <input required class="input" id="it-min" type="number" min="0" 
            name="minimum" placeholder="Enter Minimum Capacity"
            value="<?php echo $detailItem->get_minimum(); ?>"/>
        </div>

        <div class="edit_max">
            <label for="type">Maximum Stock</label>
            <input required id="it-max" class="input" type="number" min="0" 
            name="maximum" placeholder="Enter Maximum Capacity"
            value="<?php echo $detailItem->get_maximum(); ?>"/>
        </div>
    </div>

    <div class="row">
        <input type="submit" name="button" class="btn" value="Save"/>
        <a class="btn bg-red" href="<?php echo $_SERVER['PHP_SELF'].'?c='.$itemid.'&v=itemreq'; ?>">Cancel</a>
    </div>
</form>