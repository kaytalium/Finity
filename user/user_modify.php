<?php
    $user = new \Finity\Profile\User();
    $v = ($isMod?'edit':'create');
    if($isMod){
        $person_id= (isset($_GET['id'])?$_GET['id']:'');
        $user = $pm->getUser($person_id);
    }

   



?>
<link rel="stylesheet" href="css/createuser.css">
<div class="createUser">
    <form class="modify-user-form" action="functions/admin.php?v=<?php echo $v;?>" method="POST">
        <input type="text" name="person_id" value="<?php echo $user->get_person_id(); ?>" hidden>
        <div class="tablehead">
            <h1>
                <?php 
                    if($isMod)
                        echo 'Update User';
                    
                    if($isCreate)
                        echo 'Create User';
                ?>
            </h1>
        </div>
        <table>
            <tr>
                <td>Firstname:</td>
                <td><input type="text" placeholder="FirstName" class="textbox" name="firstname" required 
                value="<?php echo $user->get_firstname(); ?>"></td>
            </tr>
            <tr>
                <td>Lastname:</td>
                <td><input type="text" placeholder="LastName" class="textbox" name="lastname" required
                value="<?php echo $user->get_lastname(); ?>"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td width="55%"><input type="email" placeholder="Email" class="textbox" name="username" required
                value="<?php echo $user->get_username(); ?>"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" placeholder="Password" class="textbox" id="password_txt" name="password"></td>
                <td>
                    <span class="clickable" id="clickable">
                        <?php
                            if($isMod)
                                echo 'Reset Password';
                            
                            if($isCreate)
                                echo 'Generate Password';
                        ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>User Type</td>
                <td> 
                    <select class='select' name="user_type_id">
                        <option value="default" hidden>--User Type--</option>
                        <option value="222" <?php echo ($user->get_type()=='admin'?'selected':''); ?>>Administrator</option>
                        <option value="675" <?php echo ($user->get_type()=='normal'?'selected':''); ?>>Normal User</option>
                    <select>
                </td>
            </tr>
            <tr>
                <td><input type = "submit" value="Submit" class="btn"></td>
                <td><a href="<?php echo $_SERVER["PHP_SELF"].'?v=list'; ?>" class="btn">Cancel</a></td>
            </tr>
        </table>
    </form>
</div>