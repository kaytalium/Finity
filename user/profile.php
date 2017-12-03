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
                        <td>Kelly Logan</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>goallie@gmail.com</td>
                    </tr>
                    <tr>
                        <td>User Type:</td>
                        <td>Administrator</td>
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
                <form action="" method="POST" class="edituserinfoform"> 
                    <table>
                        <tr>
                            <td>Firstname:</td>
                            <td><input type="text" placeholder="Firstname" class="input" required/></td>
                        </tr>
                        <tr>
                            <td>Lastname:</td>
                            <td><input type="text" placeholder="Lastname" class="input" required/></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" placeholder="Email" class="input" required/></td>
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
