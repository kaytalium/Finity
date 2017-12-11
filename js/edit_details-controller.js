$(document).ready(function(){

    /**
     * Controller for the Product Detail
     */

     //Edit category plus, edit, and close icon 
     cat_plus    = $('#edit_plus')
     cat_pencil  = $('#edit_pencil')
     cat_close   = $('#edit_close') 
 
    //containers that will be affected when icons are clicked
    item_cat     = $("#it-cat") //select
    edit_input   = $('#it-input-cat') 

    //mini menu tabs
    mini_menu = $("#mini_menu_ul")


     //click function on icons 
     cat_plus.click(function(){
         cat_pencil.hide();
         cat_close.show()
         item_cat.hide()
         edit_input.attr('name','new_category')
         edit_input.val('')
         edit_input.show()
         $(this).hide()
     })

     cat_pencil.click(function(){
        cat_plus.hide();
        cat_close.show()
        $(this).hide()
        item_cat.hide()
        edit_input.attr('name','edit_category')
        edit_input.show(function(){
            $(this).val(item_cat.val())
        })
        
    })

    cat_close.click(function(){
        $(this).hide()
        cat_plus.show()
        cat_pencil.show()
        item_cat.show()
        edit_input.attr('name','category')
        edit_input.hide()
        edit_input.val('empty')
    })

    //Click function on the mini menu 
    mini_menu.children('li').click(function(){
        $(this).siblings('li').removeClass('active')
        //hide all the forms
        $(this).siblings('li').each(function(id,li){
            el = $(li).html().toLowerCase().replace(" ","_")
            
            //console.log($("#"+el).html())

            $("#"+el).fadeOut(600).delay(300)
        })

        $(this).addClass('active')
        //show the selected form
        $('#'+$(this).html().toLowerCase().replace(" ","_")).delay(600).fadeIn(300)
    })
    
    /**
     * Controller for the Update Stock  
     */

     //Add Supplier plus, edit, and close icon 
     add_plus    = $('#add_plus')
     add_pencil  = $('#add_pencil')
     add_close   = $('#add_close') 
 
    //containers that will be affected when icons are clicked
    //us: update stock
    supplier_sel     = $("#us_sel_supplier") //select
    supplier_input   = $('#us_input_supplier') 
    
    //Setting the current date 
    $('#add_date').val(new Date().toDateInputValue());

    //icon click functions
    add_plus.click(function(){
        add_pencil.hide()
        add_close.show()
        supplier_input.show()
        supplier_sel.hide()
        $(this).hide()
    })

    add_pencil.click(function(){
        $sel_val = supplier_sel.val();
        console.log('Selected Len: '+$sel_val.length)
        if($sel_val.length > 1){
            add_plus.hide();
            add_close.show()
            $(this).hide()
            supplier_sel.hide()
            supplier_input.show(function(){
                $(this).val(supplier_sel.val())
            })
        }else{
            alert("No Supplier was selected")
        }
        
    })

    add_close.click(function(){
        $(this).hide()
        add_plus.show()
        add_pencil.show()
        supplier_sel.show()
        supplier_input.hide()
        supplier_input.val('')
    })

    //stop and check form if unit is greater than capacity
    capacity       = $("#us_cap_amt");
    update_btn     = $("#us_update_btn")
    us_input_unit  = $("#us_input_unit")
    us_unit_err    = $("#us_unit_err")

    //Stop form and check unit input
    update_btn.click(function(e){
       // e.preventDefault()
        us_unit_err.hide().html("")
        us_input_unit.css("border","1px solid grey")
        //get values to compare
        cap = parseInt(capacity.html())
        input = parseInt(us_input_unit.val())

        //check no nil value for capacity coming from database
        if(typeof(cap)!='number' && isNaN(cap) || typeof(cap) === 'number' && isNaN(cap)){
            us_input_unit.css("border","1px solid red")
            us_unit_err.show().html('check capacity')
            return 
        }
        
        //check no nil value for input coming from user
        if(typeof(input) === "number" && isNaN(input) || typeof(input) != "number" && isNaN(input)){
            us_input_unit.css("border","1px solid red")
            us_unit_err.html('No unit was provided').show()
            return 
        }

        //at this point we can compare both numbers
        if(input > cap){
            us_input_unit.css("border","1px solid red")
            us_unit_err.html('Cannot stock greater than capacity').show()
            return 
        }
        //at this point we will be ok to submit form
        $('.update_stock_form').submit()
    })



    /**
     * Controller for the Reduce Stock  
     */
    rs_item_table           = $(".item_table")
    rs_sold_container       = $("#rs_sold_container")
    rs_avail_container      = $("#rs_avail_container")

    rs_check                = $(".rs_check")
    rs_qty_sold             = $("#rs_qty_sold")
    rs_amt_sold             = $("#rs_amt_sold")
    rs_total_qty            = $("#rs_total_qty")
    rs_avail_qty            = $("#rs_avail_qty")
    rs_avail_amt            = $("#rs_avail_amt")
    rs_ok_btn               = $("#rs_ok_btn")


    rs_avail_container.hide()
    rs_sold_container.hide()

    qty_sold = 0;
    total_avail = rs_total_qty.html()
    check_holder = {};
    
    selling_price = 0;
    counter = 0;
    rs_check.click(function(){
        counter = 0;
        $(this).parent('td').siblings('td').each(function(id, td){
            el = Number($(td).html().replace(/[^0-9\.-]+/g,""))
            selling_price = el
        })
        check_holder[$(this).val()] = $(this).prop('checked')
        $.each(check_holder, function(k, v){
            if(v){
                counter += 1
            }
        })
        //console.log("Counter: "+counter);
        //console.log(check_holder)
        if(counter>0){
            rs_sold_container.delay(200).fadeIn(600, function(){
                rs_avail_container.fadeIn(600)
            })
        }else{
            rs_avail_container.fadeOut(600)
            rs_sold_container.fadeOut(600)
        }

        qty_sold = counter * selling_price
        

        rs_qty_sold.html(counter)
        rs_amt_sold.formatMoney(qty_sold)

        diff = total_avail - counter
        rs_avail_qty.html(diff)
        rs_avail_amt.formatMoney(diff * selling_price)
    })

    rs_ok_btn.click(function(e){
        e.preventDefault()
        if(counter>0){
            $('#rs_form').submit();
        }
    })

})

Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});

jQuery.fn.extend({
formatMoney : function(v){
    this.html('$' + parseFloat(v, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString())
}

})