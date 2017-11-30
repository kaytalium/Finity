$(document).ready(function(){
    //setting up referrence
    $name = $("#name");
    $edit_name = $("#edit_name")
    $name_pencil = $name.children('i')

    //btns
    $close = $edit_name.children('.fa-check-circle')
    $confirm = $edit_name.children('.fa-times-circle')
    
    $name_pencil.click(function(){
        hideShow($name,$edit_name)    
    })

    $close.click(function(){
        hideShow($edit_name, $name);
    })

    $confirm.click(function(){
        hideShow($edit_name,$name)
    })
});

/**
 * 
 * @param {*container that you want to hide} hideCon 
 * @param {*container that you want to show} showCon 
 */
function hideShow(hideCon, showCon){
    hideCon.hide();
    showCon.show();
}