<?php $category_lsit = $im->getCategories();?>
<div class="report_container inventory <?php echo ($my_report=='inventory'?'':'hide'); ?>">
    <div>
        <p>Name: <span id="report_name">Inventory Report</span></p>
        <p>Date Generated: <span id="gen_date"><?php echo Date('M d, Y'); ?></span></p>
    </div>
    <div class="inf0">
        <table class="inventory_tbl">
            <thead>     
            <tr class="tbl-header">  
                <th>Category</th>
                <th>Supplier</th>
                <th>Purchase Price</th>    
                <th>Selling Price</th>
                <th>Quantity On Hand</th>
                <th>Amount Ordered</th>
            </tr>
            </thead>  
            <tbody class="t-body">
            <?php
                if(!empty($category_lsit)){
                    foreach ($category_lsit as $key => $row) {
                        $item_list = $im->getReport('inventory',$row['category_id']);
                        if(!empty($item_list)){
                            echo '<tr>
                                    <td colspan="5" class="cat_head">'.$row['category'].'</td>
                                  </tr>';
                    
                            if(!empty($item_list)){
                                foreach ($item_list as $key => $item) {
                                    echo '<tr>
                                        <td>'.$item['name'].'</td>
                                        <td>'.$item['supplier'].'</td>
                                        <td>'.toMoney($item['purchase_price']).'</td>
                                        <td>'.toMoney($item['selling_price']).'</td>
                                        <td>'.$item['quantity_on_hand'].'</td>
                                        <td>'.$item['amount_order'].'</td>
                                    </tr>';
                                }
                            }

                        }
                        
                        
                    }
                }
            

            ?>
            </tbody>
        </table>
    </div>
</div>


