<?php
/**
 * Login Test Environment
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //NB. create a class call UserValidator
    //that as a constructor accept the redirect path
    if(isset($_POST['usrname']))
        $usr = $_POST['usrname'];
    
    if(isset($_POST['pswd']))
        $pswd = $_POST['pswd'];

    /**
     * Authenticating user
     * this example get the user request and setup a user class
     */
    $user = new \Finity\Profile\User(array("username"=>$usr,'password'=>$pswd));


    /**
     * Authenticate the user 
     */
    $Oauth = new \Finity\Authenticate\Oauth($user);

    /**
     * Check if user is authenticated by the system
     */
    $isloggedIn = $Oauth->login(); //return boolean

    /**
     * If the user is loged in then get the user information return from the database 
     * you can now use this information to setup your sessions vars and all that.
     * at this point you will also get the user profile such as firstname, lastname, etc...
     */
    if($isloggedIn){
        $user = $Oauth->getLoggedInUser(); 
        print_ra($user->get_profile());
    }
    else
        $_SESSION['errors'] = $Oauth->loginErrors();
    /**
     * $_SESSION['user'] = user->get_all();
     */
}
 ?>

<div class="errors">
<?php
    if(isset($_SESSION['errors']) && !empty($_SESSION["errors"])){
        echo $_SESSION['errors'];
         
    }
?>
</div>
 <div class="flex">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="text" name="usrname" placeholder="Username">
        <input type="password" name="pswd" placeholder="Password">
        <input type="submit" value="Login">
    </form>
     
 </div>