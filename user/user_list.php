<?php
    $list_of_users = $pm->getAllUsers();
?>
<div class="mainList">
    <div id="add-user" class="floating-plus">
        <a href="<?php echo $_SERVER["PHP_SELF"].'?v=create'; ?> " title="Add user">
            <i class="fa fa-plus fa-lg" aria-hidden="true" title="Add user"></i>
        </a>
    </div>

    <div class="tablehead">
        <h1>Users</h1>
    </div>
    <table class="userlist-table">
        <tr>
            <th></th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>User Type</th>
            <th>Email</th>
            <th>Status</th>
            <th colspan="4">Action</th>
        </tr>
        <?php

            if(isset($list_of_users) && is_array($list_of_users)){
                foreach($list_of_users as $user){
                    $fa_cls = ($user->get_status()==1?'fa-go':'fa-stop');

                    if($user->get_username() != $_SESSION['user']){
                        echo '<tr>
                        <td><i class="fa fa-certificate '.$fa_cls.'" aria-hidden="true"></i></td>
                        <td>'.$user->get_firstname().'</td>
                        <td>'.$user->get_lastname().'</td>
                        <td>'.$user->get_type().'</td>
                        <td>'.$user->get_username().'</td>
                        <td>'.$user->get_status_def().'</td>
                        <td>
                            <a href="'.$_SERVER['PHP_SELF'].'?v=edit&id='.$user->get_person_id().'">
                                <i class="fa fa-pencil" aria-hidden="true" title="Edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="">
                                <i class="fa fa-trash" aria-hidden="true" title="Delete" 
                                data-v="delete" data-id="'.$user->get_person_id().'"}" data-name="'.$user->get_firstname().' '.$user->get_lastname().'"></i>
                            </a>
                        </td>
                        <td>
                            <a href="functions/admin.php?v=suspend&id='.$user->get_person_id().'&cs='.$user->get_status().'">
                                <i class="fa fa-pause" aria-hidden="true" title="Suspend"></i>
                            </a>
                        </td>
                    </tr>';
                    }
                }
            }

        ?>
        
    </table>
    <div class="msgbox hide">
    <form class="msgbox_form" action="" method="POST">
            <label for="">Are sure you want to delete user?</label>
            <h3 id="user_person">Ovel Heslop</h3>
            <input type="submit" value="Yes" class="btn bg-green">
            <button id="btn_msg_cancel" class="bg-red btn" >Cancel</button>
    </form>
</div>
</div> 

