$(document).ready(function(){
    //setting up referrence to containers

    //Item Detail edit
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

    //user profile edit
    $userDetail         = $(".user-detail")
    $edituserinfo       = $(".edituserinfo")

    //buttons 
    $editProfile        = $("#edit-user-profile")
    $cancelUserUpdate   = $("#cancel-user-update")

    //funcationalies
    $editProfile.click(function(){
        hideShow($userDetail,$edituserinfo)
    })

    $cancelUserUpdate.click(function(e){
        e.preventDefault()
        hideShow($edituserinfo,$userDetail)
    })

    //Change Password functionalities

    //change password container
    $chngPassword       = $(".change-password")

    //button
    $chngPswdbtn        = $("#change-password")
    $savePassword       = $("#save-password")
    $cancelPassword     = $("#cancel-password")

    //Password textbox
    $newpwd             = $("#newPwd")
    $retypePwd          = $("#rtyPwd")

    //functions
    $chngPswdbtn.click(function(){
        
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
        })
    })

    //Save New Password
    $savePassword.click(function(){
        //check to see if password match before closing
        
        if($newpwd.val() != $retypePwd.val() || $newpwd.val().length == 0){
            $newpwd.addClass('error')
            $retypePwd.addClass('error')
        }else{
            $newpwd.addClass('ok').removeClass("error")
            $retypePwd.addClass('ok').removeClass("error")
            $chngPassword.hide(600, function(){
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