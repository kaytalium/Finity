<?php 
    $item_c = $detailItem->get_quantity_on_hand();
    $sel = 0;
    $diff = $item_c - $sel;
    $price = $detailItem->get_price();

?>
<div class="row">
    <h3><?php echo $detailItem->get_name(); ?></h3>
</div>
<div class="report_info">
    <table class="item_detail_tbl"> 
        <tr>
            <td> 
                <span>Quantity on hand <span id="rs_total_qty"><?php echo $item_c?></span></span><br>
                <span><?php echo toMoney(($price * $item_c));?></span>
            </td>
            <td id="rs_sold_container" class="hide">
                <span>Quantity sold <span id="rs_qty_sold"><?php echo $sel;?></span></span><br>
                <span id="rs_amt_sold"><?php echo toMoney(($price * $sel)); ?></span>
            </td>
            <td id="rs_avail_container" class="hide">
                <span>Available <span id="rs_avail_qty"><?php echo $diff?></span></span><br>
                <span id="rs_avail_amt"><?php echo toMoney(($price*$diff));?></span>
            </td>
        </tr>
    </table>
   
    
    <?php
        $itemManager = new \Finity\Product\ItemManager;
        $itemModelList = $itemManager->getModelList($detailItem->get_item_id());
        
    ?>
</div>
<form action="functions/item_controller.php?v=update&opt=reduce_stock" method="post" id="rs_form">
    <div class="tbl_container row">
            
            <table class="item_table">
                <tr>
                    <th></th>
                    <th>Item Id</th>
                    <th>Price</th>
                </tr>
                <?php
                if(!empty($itemModelList)){
                    foreach($itemModelList as $model){
                        echo '
                        <tr>
                            <td> <input type="checkbox" value="'.$model['model_id'].'" name="'.$model['model_id'].'" class="rs_check"> </td>
                            <td>'.$model['model_id'].'</td>
                            <td>'.toMoney($model['price']).'</td>
                        </tr>';
                    }
                }
                ?>
            </table>
        
    </div>
    <div class="row">
        <input type="submit" value="Ok" name="ok" class="btn" id="rs_ok_btn"/>
        <a class="btn bg-red" href="<?php echo $_SERVER['PHP_SELF'].'?c='.$itemid.'&v=itemreq'; ?>">Cancel</a>
    </div>
</form>