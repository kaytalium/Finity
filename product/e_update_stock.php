<form action="" method="POST">

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
        <label for="unit">Purchase Price</label>
        <input required class="input" id="it-unit" type="number" 
        name="purchase_price" placeholder="Enter your Price" 
        value=""/>
    </div>

    <div class="add_unit row">
        <label for="unit">Units Bought</label>
        <input required class="input" id="it-unit" type="number" 
        name="unit" placeholder="Enter your Unit" 
        value=""/>
    </div>

    <div class="row">
        <input type="submit" name="button" class="btn" value="Update"/>
        <input type="submit" class="btn bg-red" name="button" value="Cancel" id="<?php echo ($showEdit?'cancel-new-item':'cancel-btn'); ?>"/>
    </div>
</form>