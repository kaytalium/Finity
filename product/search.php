<?php 

include 'item_profile.php'; 

if($searchWord){
    $itemList= $prolist->getSearchResult($searchWord);
    $ct = count($itemList);
?>
   
   <div class="result_info">
        <span>
        <?php echo $ct.' result'.($ct>1?'s':'').' found'; ?>
        </span>

        <span class="search_word">
            <?php echo '<br>"'.$searchWord.'"'; ?>
        </span>
   </div>
   
   <div class="items">
    <?php   
        foreach($itemList as $key=>$item)
        {
            echo search_item($item);
        }
    }else{
        ?>
        <div class="result_info">
        <span>
        <?php echo '0 item found'; ?>
        </span>

        <span class="search_word">
            <?php echo '<br>"'.$searchWord.'"'; ?>
        </span>
   </div>
   <?php
    }
        ?>
        </div> 