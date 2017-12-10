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
        <div class="edit_info show">
            <div class="mini_menu">
                <ul>
                    <li class="active">Product Detail</li>
                    <li>Reduce Stock</li>
                    <li>Update Stock</li>
                </ul>
            </div>
            <form action="functions/item_controller.php?v=<?php echo ($showEdit?'create':'update'); ?>" method="POST">
                <input type="text" value="<?php echo $itemid; ?>" hidden="hidden" name="item_id">
                <div class="row">
                    <div class="edit_cat">
                        <label for="category">
                        Category 
                        <i class="fa fa-plus fa edit_plus" aria-hidden="true" mytitle="Add New Category"></i>
                        <i class="fa fa-pencil fa edit_pencil" aria-hidden="true" mytitle="Edit Category"></i>
                        </label>
                        <input type="text" placeholder="Enter new category" name="category" class="input hide">
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
                        <input required class="input" id="it-name" type="text" name="name" placeholder="Enter Item Name"; value="<?php echo $detailItem->get_name(); ?>"/>
                    </div>

                    <div class="edit_description">
                        <label for="description">Description</label>
                        <textarea class="textarea" id="it-desc" maxlength=250 required  name="description" placeholder="Enter item Description"><?php echo $detailItem->get_description(); ?></textarea>
                    </div>

                    <div class="edit_price">
                        <label for="price">Price</label>
                        <input required class="input" id="it-price" type="number" step="0.01" min="0" name="price" placeholder="Enter the Price"; value="<?php echo $detailItem->get_price(); ?>"/>
                    </div>

                    <div class="edit_type">
                        <label for="type">Type</label>
                        <input required id="it-type" class="input" type="text" name="type" placeholder="Enter a Type"; value="<?php echo $detailItem->get_type(); ?>"/>
                    </div>
                </div>

                <div class="row">
                    <input type="submit" name="button" class="btn" value="Save"/>
                    <input type="submit" class="btn bg-red" name="button" value="Cancel" id="<?php echo ($showEdit?'cancel-new-item':'cancel-btn'); ?>"/>
                </div>
            </form>
        </div>
    </div> 

    <div class="update_stock_container hide">
        <form action="">
        <div class="edit_unit">
                    <label for="unit">Unit</label>
                    <input required class="input" id="it-unit" type="number" name="unit" placeholder="Enter your Unit"; value="<?php echo $detailItem->get_unit(); ?>"/>
                </div>
        </form>
    </div>

</div>

