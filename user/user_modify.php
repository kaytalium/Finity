<link rel="stylesheet" href="css/createuser.css">
<div class="createUser">
    <form class="modify-user-form" action="#" method="POST">
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
                <td><input type="text" placeholder="FirstName" class="textbox" required></td>
            </tr>
            <tr>
                <td>Lastname:</td>
                <td><input type="text" placeholder="LastName" class="textbox" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td width="55%"><input type="email" placeholder="Email" class="textbox" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" placeholder="Password" class="textbox" required id="password_txt"></td>
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
                    <select class='select'>
                        <option value="default" hidden>--User Type--</option>
                        <option value="admin">Administrator</option>
                        <option value="normal">Normal User</option>
                    <select>
                </td>
            </tr>
            <tr>
                <td><input type = "submit" value="submit" class="btn"></td>
                <td><a href="<?php echo $_SERVER["PHP_SELF"].'?v=list'; ?>" class="btn">Cancel</a></td>
            </tr>
        </table>
    </form>
</div>