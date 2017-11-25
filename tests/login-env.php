<?php
/**
 * Login Test Environment
 */

/**
 * Authenticating user
 * this example get the user request
 */
$user = new \Finity\Profile\User(array("username"=>"heslopok",'password'=>"admin"));

/**
 * Authenticate the user 
 */
$Oauth = new \Finity\Authenticate\Oauth($user);

/**
 * Check if user is authenticated by the system
 */
$isloggedIn = $Oauth->login(); //return boolean

/**
 * If the user is loggin then get the user information return from the database 
 * you can now use this information to setup your sessions vars and all that.
 */
$user = $Oauth->getLoggedInUser(); 
/**
 * $_SESSION['user'] = user->get_all();
 */
