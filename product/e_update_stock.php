<div class="row update_stock_name">
    <h3><?php echo $detailItem->get_name(); ?></h3>
</div>
<form action="functions/item_controller.php?v=update&opt=update_stock" method="POST" class="update_stock_form">

    <div class="add_date row">
        <label for="unit">Purchase Date</label>
        <input required="required" class="input" id="add_date" type="date"  
        name="purchase_price" placeholder="Enter your Price" 
        value=""/>
    </div>
    
    <div class="add_supplier row">
        <label for="unit">
            Suppliers
            <i class="fa fa-plus fa add_plus" id="add_plus" aria-hidden="true" mytitle="Add New Supplier"></i>
            <i class="fa fa-pencil fa add_pencil" id="add_pencil" aria-hidden="true" mytitle="Edit Supplier"></i>
            <i class="fa fa-close fa add_close hide" id="add_close" aria-hidden="true" mytitle="Close"></i>
        </label>
        <input required="required" type="text" placeholder="Enter Supplier" name="supplier" class="input hide" id="us_input_supplier">
        <select required="required" name="supplier" id="us_sel_supplier" class="us_sel_supplier">
                <option value="" hidden>--Supplier--</option>
                <option value="Dell">Dell</option>
                <option value="Hewlett Packard">Hewlett Packard</option>
                <?php
                    // $clist = $prolist->getCategories();
                    // foreach($clist as $cat){
                    //     if($cat === $detailItem->get_category())
                    //         $selected = "selected";
                    //     else
                    //         $selected = "";
                    //     echo '<option value="'.$cat.'" '.$selected.'>'.$cat.'</option>';
                    // }
                
                ?>
        </select>
        
    </div>

    <div class="add_price row">
        <div class="lg-1" >Purchase Price</div>
        <input required class="input" id="us_input_price" type="number" 
        name="purchase_price" placeholder="Enter your Price" 
        value=""/>
    </div>

    <div class="add_unit row">
        <div for="unit" class="lg-1">Units Bought</div><span id="us_unit_err" class="us_unit_err"></span>
        <input required class="input f-left" id="us_input_unit" type="number" 
        name="unit" placeholder="Enter your Unit" 
        value=""/>
        <div class="add_unit_capacity">Available Capacity <span id="us_cap_amt">10</span> </div>
    </div>

    <div class="row">
        <input type="submit" name="button" class="btn" value="Update" id="us_update_btn"/>
        <a class="btn bg-red" href="<?php echo $_SERVER['PHP_SELF'].'?c='.$itemid.'&v=itemreq'; ?>">Cancel</a>
    </div>
</form>