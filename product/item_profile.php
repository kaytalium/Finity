<!-- item card to display the items to the users --> 
<?php
    function item_profile(\Finity\Product\Item $item){
    return '<div class="item_profile_container">
        <div class="item_profile_image">
            <img  src= "image/'.$item->get_image_url().'" alt="macbook pro">
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