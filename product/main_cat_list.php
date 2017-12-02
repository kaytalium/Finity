<div class="item-wrapper ">
                <!-- this floats to the left with categories -->
                <div class="sidebar">
                    <div class="catlist">
                        <div class="title">Category</div>
                        <?php include 'product/category_list.php';?> 
                    </div>
                </div> 

                <!-- area for items to display to user-->
                <div class="item-container">
                    <?php
                        include 'product/list.php';
                    ?>
                    <div class="plus_btn">
                        <a href="<?php echo $_SERVER["PHP_SELF"].'?c=-1&v=itemreq';?>">
                            <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>    