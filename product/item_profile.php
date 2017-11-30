<!-- item card to display the items to the users --> 
<?php
    function item_profile(\Finity\Product\Item $item){
    
    return '<div class="item_profile_container">
        <div class="item_profile_image">
           <a href="'.$_SERVER["PHP_SELF"].'?c='.$item->get_item_id().'&v=itemreq">
                <img  src= "image/'.$item->get_image_url().'" alt="macbook pro">
            </a>
        </div> 

        <div class="row">
            <div class="description">'.$item->get_description().' </div> 
        </div>

        <div class="row">
            <div class="name">'.$item->get_name().'</div> 
        </div>

        <div class="row">
            <div class="price">'.$item->get_formatted_price().'
                
                <span class="quantity">'.$item->get_unit().'</span>
            </div> 
        </div>
    </div>';
    }

?>