<?php 

include 'item_profile.php'; 

//Print_r($_GET);
$searchWord = strtolower((isset($_GET["searchbox"])?$_GET["searchbox"]:''));


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
            echo item_profile($item);
        }
    }
        ?>
        </div> 

