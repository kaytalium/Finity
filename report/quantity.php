<?php $quantity_report = $im->getReport("quantity"); ?>
<div class="report_container <?php echo ($my_report=='quantity'?'':'hide'); ?>">
            <div>
                <p>Name: <span id="report_name"><?php echo ucwords($my_report); ?> Report</span></p>
                <p>Date Generated: <span id="gen_date"><?php echo Date('M d, Y'); ?></span></p>
            </div>
                 
            <div class="tbl-display">
                <table id='quantity_tbl'>
                    <thead>
                    <tr class="tbl-header">  
                        <th>Category</th>
                        <th>Avg. Minimum</th>    
                        <th>Avg. Maximum</th>
                        <th>Quantity On Hand</th>
                    </tr>  
                    </thead>
                    <tbody class="t-body">
                        <?php
                        foreach ($quantity_report as $row) { 
                            # code...
                            echo '<tr> 
                            <td>'.$row['category'].'</td> 
                            <td>'.ceil($row['minimum']).'</td> 
                            <td>'.ceil($row['maximum']).'</td> 
                            <td>'.$row['quantity_on_hand'].'</td> 
                        </tr>';
                        }
                        
                            ?>
                    </tbody>
                </table>  
            </div>                  
        </div> 
