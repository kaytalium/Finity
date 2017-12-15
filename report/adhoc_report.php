<?php
    $im = new \Finity\Product\ItemManager;
    //$getAllItems = $im->getItems();

    $category_list = $im->getCategories();
    //print_ra(count($getAllItems));
?>
<div class="adhoc_report_container">
    <h1 class="report_title">Adhoc Report</h1>
   <div class="addhoc_controller">
       <table>
           <tr>
               <td><input type="checkbox" name="" class="checkbox" id="ck_name">
                    <label>Name</label></td>
               <td>
                   <div id="name_input_box">
                        <input type="text" name="" id="ck_name_input">
                   </div>
                   
                </td>
           </tr>
           <tr>
               <td><input type="checkbox" name="" class="checkbox" id="ck_qty">
                    <label>Quantity on hand</label></td>
               <td>
                   <div id="qty_sel_input_box">
                        <select name="qty_logical_con" id="qty_logic" class="logics">
                            <option value="=">=</option>
                            <option value=">">></option>
                            <option value="<"><</option>
                        </select>
                        <input type="number" class="num" id="ck_qty_input">
                    </div>
                </td>
           </tr>
           <tr>
               <td><input type="checkbox" name="" class="checkbox" id="ck_price">
               <label>Price</label></td>
               <td>
                   <div id="price_sel_input_box">
                        <select name="price_logical_con" id="price_logic" class="logics">
                            <option value="=">=</option>
                            <option value=">">></option>
                            <option value="<"><</option>
                        </select>
                        <input type="number" class="num" id="ck_price_input">
                    </div>
               </td>
           </tr>
           <tr>
               <td><input type="checkbox" name="" class="checkbox" id="ck_cat">
        <label>Category</label></td>
               <td>
                   <div id="cat_select_box">
                        <select name="" id="ck_cat_select" class="category_sel">
                            <option value="0" hidden selected>--Category--</option>
                            <?php 
                                if(!empty($category_list)){
                                    foreach($category_list as $cat){
                                        echo '<option value="'.$cat['category'].'">'.$cat['category'].'</option>';
                                    }
                                }
                            ?>
                            
                            
                        </select>
                    </div>
                </td>
           </tr>
           <tr>
               <td colspan="3"><input type="button" name="" class="btn" value="Generate" id="rgenbtn"></td>
           </tr>
       </table>
        
        
   </div>

   <div class="adhoc_table">
        <table id="adhoc_tbl">
            <tr>
                <th>Item Id</th>
                <th>Category</th>
                <th>Name</th>
                <th>Type</th>
                <th>Unit</th>
                <th>Price</th>
            </tr>
           
        </table>
   </div>
   
</div>
