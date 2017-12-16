$(document).ready(function(){
    dlt_icon        = $('.fa-trash')
    user_person     = $('#user_person')
    msgbox          = $('.msgbox')
    msgbox_form     = $('.msgbox_form')
    btn_msg_cancel  = $('#btn_msg_cancel')
    userlist_tbl  = $('#userlist-table')

    dlt_icon.click(function(e){
        e.preventDefault()
        //get the information for the user we want to delete
        btn_opt = $(this).data('v')
        user_id = $(this).data('id')
        person  = $(this).data('name')
        dpath   = "functions/admin.php?v="+btn_opt+"&id="+user_id
        
        //pass the data to the message box control
        user_person.html(person)
        action = msgbox_form.attr('action', dpath)
        console.log(msgbox_form.attr('action'))
        msgbox.fadeIn()
        
    })

    btn_msg_cancel.click(function(e){
        e.preventDefault();
        msgbox.fadeOut();
    })

    if(typeof(userlist_tbl.offset()) !=='undefined'){
        topof_userlist_tbl = Math.ceil(userlist_tbl.offset().top) - Math.ceil($('.mainList').offset().top) - 1
        scrollAndFreezeTableHead($('.mainList'),userlist_tbl,topof_userlist_tbl)            
    }


})