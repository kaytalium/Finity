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

     

      

     














})
