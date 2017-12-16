$(document).ready(function(){
    $adhoc_tbl = $("#adhoc_tbl")

    $rgenbtn    = $("#rgenbtn")
    //checkbox
    $ck_name    = $("#ck_name")
    $ck_cat     = $("#ck_cat")
    $ck_price   = $("#ck_price")
    $ck_qty     = $("#ck_qty")

    //
    $ck_name_input = $("#ck_name_input")
    $ck_cat_select = $("#ck_cat_select")
    $price_logic   = $("#price_logic")
    $ck_price_input= $("#ck_price_input")

    $qty_logic     = $("#qty_logic")
    $ck_qty_input  = $("#ck_qty_input")



    $rgenbtn.click(function(){
        data = setCheck()
        
        if(data.state){
            generate_report($('#adhoc_tbl_result'),data.x)
        }
        
        
    })

    //Hide and show the input for the Name item 
    $ck_name.click(function(e){
        if($(this).prop('checked'))
            $("#name_input_box").fadeIn(600)
        else
            $("#name_input_box").fadeOut(600)
    })

    //Hide and show the Unit Quantity on hand select and input 
    $ck_qty.click(function(){
        if($(this).prop('checked'))
        $('#qty_sel_input_box').fadeIn(600)
        else
        $('#qty_sel_input_box').fadeOut(600)
    })

    //Hide and show the Price select and input
    $ck_price.click(function(){
        if($(this).prop('checked'))
        $('#price_sel_input_box').fadeIn(600)
        else
        $('#price_sel_input_box').fadeOut(600)
    })

    //Hide and show the category input
    $ck_cat.click(function(){
        if($(this).prop('checked'))
        $("#cat_select_box").fadeIn(600)
        else
        $("#cat_select_box").fadeOut(600)
    })

    //Table scroll 
    $quantity_tbl = $('#quantity_tbl')
    $inventory_tbl = $('.inventory_tbl')
    
    $parent_holder = $('.right')

    console.log(typeof($quantity_tbl.offset()))

    if(typeof($quantity_tbl.offset()) !=='undefined'){
        topof_quantity_tbl = Math.ceil($quantity_tbl.offset().top) - Math.ceil($('.right').offset().top) + 10
        scrollAndFreezeTableHead($parent_holder,$quantity_tbl,topof_quantity_tbl)

    }
    

    if(typeof($inventory_tbl.offset()) !=='undefined'){
        topof_inventory_tbl = Math.ceil($inventory_tbl.offset().top) - Math.ceil($('.right').offset().top) + 10
        scrollAndFreezeTableHead($parent_holder,$inventory_tbl,topof_inventory_tbl)            
    }

    if(typeof($adhoc_tbl.offset()) !=='undefined'){
          $adhoc_tbl.floatThead({
            position: 'fixed'
            });
    }
})


function generate_report(tbl,userData){
    $.ajax({
        type: 'GET',
        url: 'report/report_generator.php',
        data: userData,
        success: function(d){
            $db_data = JSON.parse(d)
            if($db_data.state){
                tbl.html('');
                $db_data.data.forEach(el => {
                    r = 
                        '<tr>'+
                            '<td>'+el.item_id+'</td>'+
                            '<td>'+el.category+'</td>'+
                            '<td>'+el.name+'</td>'+
                            '<td>'+el.type+'</td>'+
                            '<td>'+el.quantity_on_hand+'</td>'+
                            '<td>'+toMoneyFormat(el.price)+'</td>'+
                        '</tr>';
                        tbl.append(r)
                        
                });
            }
        },
        error: function(error){console.log(error)}
    })

    
       
}

function setCheck(){

    console.log($ck_cat.val())
    data = {state: false, x:{}}
    if($ck_name.prop('checked')){
        data.state = true
        data.x.name = $ck_name_input.val()
    }
    
    if($ck_cat.prop('checked')){
        data.state = true
        data.x.category = $ck_cat_select.val()
    }
    
    if($ck_price.prop('checked')){
        data.state = true
        data.x.price = $ck_price_input.val()
        data.x.price_logic = $price_logic.val()
    }
    
    if($ck_qty.prop('checked')){
        data.state = true
        data.x.quantity_on_hand = $ck_qty_input.val()
        data.x.unit_logic = $qty_logic.val()
    }
    return data; 
}

