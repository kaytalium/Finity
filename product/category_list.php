<ul class="cat-list">
    <?php
        $catItems = $prolist->getCategories();
        foreach($catItems as $key=>$cat){
            echo '<li><a href="'.$_SERVER["PHP_SELF"].'?q='.$cat.'">'.$cat.'</a></li>';
        }
    ?>
</ul>
