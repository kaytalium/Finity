$(document).ready(function(){
    $edit_btn = $("#editusprofile");
    $cancel_btn = $("#canusprofile");
    $userinfo = $(".userinfo");
   
    $edit_btn.click(function(e){
        e.preventDefault()
        $userinfo.children(".row").children(".text").hide();
        $userinfo.children(".row").children(".txtbox").removeClass("hide");
    })

    $cancel_btn.click(function(e){

      e.preventDefault()
      $userinfo.children(".row").children(".text").show();
      $userinfo.children(".row").children(".txtbox").addClass("hide");
      
    })

    //Picking up the profile detail container to show & hide onclick

    profileDetail = $("profile-detail");
    profileHolder = $(".profile-holder");
    
    profileHolder.click(function(){
        profileDetail.toggle();

    })




















})
