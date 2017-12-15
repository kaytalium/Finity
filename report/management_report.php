<?php
    $im = new \Finity\Product\ItemManager;
    
    // print_r($quantity_report);
?>
<div class="m_report_container">
    <h1>Management Report </h1>
    <div class="left">
        <p>Select a Report</p> 
        <div class="space">
            <a href="?r=quantity" class="r_btn <?php echo ($my_report=='quantity'?'active':''); ?>" id="quan_btn">Quantity</a>
            <a href="?r=inventory" class="r_btn" id="inven_btn">Inventory</a>
        </div>
    </div>

    <div class ="right">

        <?php   

            if($my_report=='quantity')
            include 'report/quantity.php';

            if($my_report=='inventory')
            include 'report/inventory.php'; 
        ?>
  </div>    

</div>
