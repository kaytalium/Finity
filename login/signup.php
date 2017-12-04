<?php
    $userInput = (isset($_SESSION['userInput'])?$_SESSION['userInput']:array());
    $userErrors = (isset($_SESSION['errors'])?$_SESSION['errors']:array());
    unset($_SESSION['userInput']);
    unset($_SESSION['errors']);

    //print_ra($userErrors);
    //print_ra($userInput);
?>
<div class="wrapper">
    <div class = "signuppage">
        <form method="POST" action="functions/validate.php?t=signup">
            <div class="title">
                <img src ="image/logo.png" class="logo-img">    
                Finity
                <span class="small-title">Inventory System</span> <span class="trademark">tm</span>
            </div>  
                
            <div class="username">
                
                <div class="form-input">
                    <label>First Name:</label><div class="msg"><?php echo isVarSet($userErrors,'fname');?></div>
                    <input type="text" placeholder="First Name" name="fname" 
                        value="<?php echo (isset($userInput['fname'])?$userInput['fname']:'');?>"
                        class="<?php echo isClass($userErrors['fname']);?>">
                </div>
                
                <div class="form-input">
                    <label>Last Name:</label> <div class="msg"><?php echo isVarSet($userErrors,'lname');?></div>
                    <input type="text" placeholder="Last Name" name="lname" 
                    value="<?php echo (isset($userInput['lname'])?$userInput['lname']:'');?>"
                        class="<?php echo isClass($userErrors['lname']);?>">
                </div>
            </div>

            <div class="form-input">
                <label>Date of Birth:</label> <div class="msg"><?php echo isVarSet($userErrors,'bday');?></div>
                <input type="date" placeholder="Date of Birth" name="bday" 
                value="<?php echo (isset($userInput['bday'])?$userInput['bday']:'');?>"
                class="<?php echo isClass($userErrors['bday']);?>">
            </div>
                    
            <div class="form-input">
                <label>Email:</label> <div class="msg"><?php echo isVarSet($userErrors,'email');?></div>
                <input type="email" placeholder="Enter your Email" name="email" 
                value="<?php echo (isset($userInput['email'])?$userInput['email']:'');?>"
                class="<?php echo isClass($userErrors['email']);?>">
            </div>
                    
            <div class="form-input">
                <label>Password:</label> <div class="msg"><?php echo isVarSet($userErrors,'pwd');?></div>
                <input type="password" placeholder="Enter your Password" name="pwd" 
                value="<?php echo isVarSet($userInput,'pwd');?>"
                class="<?php echo isClass($userErrors['pwd']);?>">
            </div>
                    
            <div class="form-input">
                <label>Repeat Password:</label> <div class="msg"><?php echo isVarSet($userErrors,'Rpwd');?></div>
                <input type="password" placeholder="Re-enter Password" name="Rpwd" 
                value="<?php echo isVarSet($userInput,'Rpwd');?>"
                class="<?php echo isClass($userErrors['Rpwd']);?>">
            </div>			
                    
            <button type="submit" name="button" value="signup" class="btn">Signup</button>
            <p>
                Already a member: <a href="<?php echo $_SERVER['PHP_SELF'];?>">Login</a>
            </p>
        </form>
    </div>
</div>