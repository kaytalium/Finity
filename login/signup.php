<div class="wrapper">
    <div class = "signuppage">
        <form>
            <div class="title">
                <img src ="image/logo.png" class="logo-img">    
                Finity
                <span class="small-title">Inventory System</span> <span class="trademark">tm</span>
            </div>  
            
            <div class="username">
                
                <div class="form-input">
                    <label>First Name:</label>
                    <input type="text" placeholder="First Name" name="fname" required>
                </div>
                
                <div class="form-input">
                    <label>Last Name:</label>
                    <input type="text" placeholder="Last Name" name="lname" required>
                </div>
            </div>

            <div class="form-input">
                <label>Date of Birth:</label>
                <input type="date" placeholder="Date of Birth" name="bday" required>
            </div>
                    
            <div class="form-input">
                <label>Email:</label>
                <input type="text" placeholder="Enter your Email" name="email" required>
            </div>
                    
            <div class="form-input">
                <label>Password:</label>
                <input type="password" placeholder="Enter your Password" name="pass" required>
            </div>
                    
            <div class="form-input">
                <label>Repeat Password:</label>
                <input type="password" placeholder="Re-enter Password" name="Rpass" required>
            </div>			
                    
            <button type="submit" name="Submit" value="submitbut" class="btn">Signup</button>
            <p>
                Already a member: <a href="<?php echo $_SERVER['PHP_SELF'];?>">Login</a>
            </p>
        </form>
    </div>
</div>