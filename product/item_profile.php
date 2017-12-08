<!-- item card to display the items to the users --> 
<?php
    function item_profile(\Finity\Product\Item $item){
    
    return '<div class="item_profile_container">
        <div class="item_profile_image">
              <img  src= "image/'.$item->get_image_url().'" width= "210" alt="'.$item->get_name().'">
       </div> 

       <!-- <div class="row">
            <div class="description">'.$item->get_description().' </div> 
        </div>-->

        <div class="row">
            <div class="name">'.$item->get_name().'</div> 
        </div>

        <div class="row">
            <div class="price">Price:' .$item->get_formatted_price().'</div>
        </div>

        <div class="row">
           <div class="quantity">Quantity: '.$item->get_unit().'</div>
        </div> 

        <div class="row"> 
            <div>
                <a href="'.$_SERVER["PHP_SELF"].'?c='.$item->get_item_id().'&v=itemreq">
                    <i class="fa fa-plus fa-lg plus" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>';
    }

    function search_item(\Finity\Product\Item $item){
        return '<div class="item_container">
        <div class="img">
            <img  src= "image/'.$item->get_image_url().'" width= "190" alt="'.$item->get_name().'">
        </div>
        <div class="item_info">
            <div class="category">'.$item->get_category().'</div> 
            <div class="name"><a href="product.php?c='.$item->get_item_id().'&v=itemreq&s=true">'.$item->get_name().'</a></div> 
            <div class="price">' .$item->get_formatted_price().'</div>
            <div class="quantity">In Stock: '.$item->get_unit().'</div>
            <a href="'.$_SERVER["PHP_SELF"].'"></a>
        </div>
    </div>';
    }

?>