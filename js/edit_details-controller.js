$(document).ready(function(){

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
         edit_input.show()
         $(this).hide()
     })

     cat_pencil.click(function(){
        cat_plus.hide();
        cat_close.show()
        $(this).hide()
        item_cat.hide()
        edit_input.show(function(){
            $(this).val(item_cat.val())
        })
        
    })

    cat_close.click(function(){
        $(this).hide()
        cat_plus.show()
        cat_pencil.show()
        item_cat.show()
        edit_input.hide()
        edit_input.val('')
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


})

Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});