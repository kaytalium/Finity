<ul class="cat-list">
    <?php
        
        $catlist = $prolist->getCategories();
        $catItems = array();
        $i = 0;
        foreach($catlist as $key=>$val){
            $catItems[$i]['category'] = $val['category'];
            $i++;
        }

        asort($catItems);
        $len = count($catItems)-1;
        function isActive($cat, $userSelectCat){
            if($cat === $userSelectCat)
                return 'active';
            else
                return '';
        }
        if(empty($selectedCat)){
            $selectedCat = $catItems[0]['category'];
        }
        foreach($catItems as $key=>$cat){
            $css = isActive($cat['category'], $selectedCat);
            echo '<li><a href="'.$_SERVER["PHP_SELF"].'?q='.$cat['category'].'&v=catreq" class="'.$css.'">'.$cat['category'].'</a></li>';
        }
    ?>
</ul>
