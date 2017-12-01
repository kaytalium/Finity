<ul class="cat-list">
    <?php
        $catItems = $prolist->getCategories();
        asort($catItems);
        $len = count($catItems)-1;
        function isActive($cat, $userSelectCat){
            if($cat === $userSelectCat)
                return 'active';
            else
                return '';
        }
        if(empty($selectedCat)){
            $selectedCat = $catItems[$len];
        }
        foreach($catItems as $key=>$cat){
            $css = isActive($cat, $selectedCat);
            echo '<li><a href="'.$_SERVER["PHP_SELF"].'?q='.$cat.'&v=catreq" class="'.$css.'">'.$cat.'</a></li>';
        }
    ?>
</ul>
