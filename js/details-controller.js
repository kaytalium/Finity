$(document).ready(function(){
    //setting up referrence to containers

    //Item Detail edit
    $display_info   = $("#display_info")
    $edit_info      = $(".edit_info")

    //Change password display text container
    $pswd_changer   = $("#pswd_changer")
    //change password container
    $chngPassword       = $(".change-password")

    //Password textbox
    $newpwd             = $("#newPwd")
    $retypePwd          = $("#rtyPwd")

    $pwd_msg             = $("#pwd_msg")
    

    
    //btns
    $editBtn    = $("#edit-btn")
    $cancelBtn  = $("#cancel-btn") 
    $cancelNewItem = $('#cancel-new-item')

    $cancelNewItem.click(function(){
        console.log($("#it-cat").html())
        $('#it-cat').removeAttr('required')
        $('#it-name').removeAttr('required')
        $('#it-desc').removeAttr('required')
        $('#it-price').removeAttr('required')
        $('#it-unit').removeAttr('required')
        $('#it-type').removeAttr('required')
    })

    //functionality
    $editBtn.click(function(){
        hideShow($display_info,$edit_info)
    })

    $cancelBtn.click(function(e){
        e.preventDefault();
        hideShow($edit_info, $display_info)
    })

    //user profile edit
    $userDetail         = $(".user-detail")
    $edituserinfo       = $(".edituserinfo")

    //buttons 
    $editProfile        = $("#edit-user-profile")
    $cancelUserUpdate   = $("#cancel-user-update")

    //funcationalies
    $editProfile.click(function(){
        hideShow($userDetail,$edituserinfo)
        $pswd_changer.hide(600)
        $chngPassword.hide(600)
        $newpwd.val("")
        $retypePwd.val("")
    
    })

    $cancelUserUpdate.click(function(e){
        e.preventDefault()
        hideShow($edituserinfo,$userDetail)
        $pswd_changer.delay(1000).show(1000)
    })

    //Change Password functionalities

    //button
    $chngPswdbtn        = $("#change-password")
    $savePassword       = $("#save-password")
    $cancelPassword     = $("#cancel-password")


    //functions
    $chngPswdbtn.click(function(){
        $newpwd.removeClass('ok').removeClass("error")
        $retypePwd.removeClass('ok').removeClass("error")
        $chngPassword.toggle(600, function(){
            $newpwd.val("")
            $retypePwd.val("")
        })

    })

    //Cancel Password
    $cancelPassword.click(function(){
        $newpwd.removeClass('ok').removeClass("error")
        $retypePwd.removeClass('ok').removeClass("error")
        $chngPassword.hide(300, function(){
            $newpwd.val("")
            $retypePwd.val("")
            $pwd_msg.html('');
            $pwd_msg.parent('tr').show();
        })
    })

    //Save New Password
    $savePassword.click(function(){
        //check to see if password match before closing
        $pwd_msg.html('');
        $pwd_msg.parent('tr').show();
        if($newpwd.val() != $retypePwd.val()){
            $newpwd.addClass('error')
            $retypePwd.addClass('error')
            $pwd_msg.html('Password does not match')
        }
        else if($newpwd.val().length == 0 ){
            $newpwd.addClass('error')
            $retypePwd.addClass('error')
            $pwd_msg.html('No password was provided')
        }
        else if($newpwd.val().length < 8){
            $newpwd.addClass('error')
            $retypePwd.addClass('error')
            $pwd_msg.html('Password too short, minimum 8 characters')
        }
        else{
            $newpwd.addClass('ok').removeClass("error")
            $retypePwd.addClass('ok').removeClass("error")
            $chngPassword.hide(600, function(){
                changePassword($newpwd, $pwd_msg)
                $newpwd.val("")
                $retypePwd.val("")
            })
        }
    })

    /**
     * Admin functionalities
     * admin has two main containers that we will swap onclick
     */

     //containers
     $createUserContainer       = $(".createUser")
     $mainListContainer         = $(".mainList")
     $password_txt              = $("#password_txt")

     //btns
     $generateNewPassword       = $("#clickable")

     //functionality
     $generateNewPassword.click(function(e){
        e.preventDefault()
        $.get('user/generate_password.php',function(data){
            $password_txt.val(data)
        })
     })
     

});

/**
 * 
 * @param {*container that you want to hide} hideCon 
 * @param {*container that you want to show} showCon 
 */
function hideShow(hideCon, showCon){
    hideCon.fadeOut(600).delay(300)
    showCon.delay(600).fadeIn(300)
}

function changePassword(pwd, pwd_msg){
    $.ajax({
        type: 'GET',
        url: 'user/change_password.php',
        data: {password:pwd.val()},
        success: function(data){
            console.log(data)
            pwd_msg.html(data).parent('tr').delay(4000).css("opacity",".55").hide(600)
        },
        error: function(error){console.log(error)}
    })
       
}