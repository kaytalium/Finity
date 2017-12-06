<?php 
    $fname = (isset($_SESSION['fname'])?$_SESSION['fname']:''); 
    $lname = (isset($_SESSION['lname'])?$_SESSION['lname']:''); 
    $user  = (isset($_SESSION['user'])?$_SESSION['user']:''); 
    $type  = (isset($_SESSION['userType']) && $_SESSION['userType']==222?'Administrator':'Normal User'); 

    ?>

<link rel="stylesheet" href="css/user_profile.css"> 

    <div class="user-wrapper">
        <div class="userinfo">
            <div class="profile-image">
                <div class="imgprofile">
                    <img src="image/alicia.jpg">
                </div>
                <div class="imageController">
                    <button class="btn lg" id="editusphoto">Change Picture</button>
                </div>
            </div>
        
            <div class="user-detail">
                <table class="info-table">
                    <tr>
                        <td>Name:</td>
                        <td><?php echo $fname.' '.$lname; ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $user; ?></td>
                    </tr>
                    <tr>
                        <td>User Type:</td>
                        <td><?php echo $type; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="row button">
                                <button class="btn" id="edit-user-profile">Edit Profile</button>
                            <!-- <button class="btn" id="canusprofile">Cancel</button> -->
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="edituserinfo">
                <form action="functions/admin.php?v=edit_current_user" method="POST" class="edituserinfoform"> 
                    <table>
                        <tr>
                            <td>Firstname:</td>
                            <td><input type="text" placeholder="Firstname" class="input" required
                            value="<?php echo $fname; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Lastname:</td>
                            <td><input type="text" placeholder="Lastname" class="input" required 
                            value="<?php echo $lname; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" placeholder="Email" class="input" required
                            value="<?php echo $user; ?>"/></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Update" class="btn"></td>
                            <td><button id="cancel-user-update" class="btn">Cancel</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        
        <table>
            <tr>
                <td colspan="2"><div class="text clickable" id="change-password">Change Password</div></td>
                <td></td>
            </tr>
            <tr class="change-password">
                <td><input type="password" class="input" placeholder="New Password" id="newPwd"></td>
                <td><input type="password" class="input" placeholder="Retype Password" id="rtyPwd"></td>
                <td>
                    <i class="fa fa-times-circle fa-lg" aria-hidden="true" id="cancel-password"></i>
                    <i class="fa fa-check-circle fa-lg" aria-hidden="true" id="save-password"></i>
                </td>
            </tr>
        </table>
        
        
    </div>   
