<?php 
    $item_c = 40;
    $sel = 3;
    $diff = $item_c - $sel;
    $price = 12598.70;

?>
<div class="row">
    <h3><?php echo $detailItem->get_name(); ?></h3>
</div>
<div class="report_info">
    <table class="item_detail_tbl"> 
        <tr>
            <td> 
                <span>Quantity on hand <? echo $item_c?></span><br>
                <span><? echo toMoney(($price * $item_c));?></span>
            </td>
            <td>
                <span>Quantity sold <? echo $sel;?></span><br>
                <span><? echo toMoney(($price * $sel)); ?></span>
            </td>
            <td>
                <span>Available <? echo $diff?></span><br>
                <span><? echo toMoney(($price*$diff));?></span>
            </td>
        </tr>
    </table>
   
    
    
</div>
<div class="tbl_container row">
    <table class="item_table">
        <tr>
            <th></th>
            <th>Item Id</th>
            <th>Price</th>
        </tr>
        <?php
        for($i=0; $i<$item_c; $i++){
            echo '
            <tr>
                <td> <input type="checkbox"> </td>
                <td>hp-000'.$i.'</td>
                <td>$'.$price.'</td>
            </tr>
            ';

        }

        ?>
    </table>
</div>
    <div class="row">
        <a href="" class="btn">Ok</a>
        <a class="btn bg-red" href="<?php echo $_SERVER['PHP_SELF'].'?c='.$itemid.'&v=itemreq'; ?>">Cancel</a>
    </div>
