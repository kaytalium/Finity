$(document).ready(function(){
    //setting up referrence to containers
    $display_info   = $("#display_info")
    $edit_info      = $(".edit_info")
    
    //btns
    $editBtn    = $("#edit-btn")
    $cancelBtn  = $("#cancel-btn") 

    //functionality
    $editBtn.click(function(){
        hideShow($display_info,$edit_info)    
    })

    $cancelBtn.click(function(e){
        e.preventDefault();
        hideShow($edit_info, $display_info)
    })

});

/**
 * 
 * @param {*container that you want to hide} hideCon 
 * @param {*container that you want to show} showCon 
 */
function hideShow(hideCon, showCon){
    hideCon.hide()
    showCon.show()
}