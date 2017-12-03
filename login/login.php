<div class="wrapper">
    <div class = "loginpage">
        <form method="POST" action="functions/validate.php?t=login">
            
            <div class="title">
                <img src ="image/logo.png" class="logo-img">    
                Finity
                <span class="small-title">Inventory System</span> <span class="trademark">tm</span>
            </div>  
            
            <div class="display_errors">
                <?php
                    print_r($_SESSION['errors']);
                ?>
            </div>

            <div class="form-input">
                <label>Email:</label>
                <input type="email" placeholder="Email Address" name="email" required>
            </div>
            
            <div class="form-input">
                <label>Password:</label>
                <input type="password" placeholder="Enter Password" name="pwd" required>
            </div>

            <button type="login" name="button" value="loginbtn" class="btn">login</button>
            <p>
                Not a member? <a href="<?php echo $_SERVER['PHP_SELF'].'?v=signup';?>">Sign up</a> 
            </p>    
        </form>
    </div>
</div>
        