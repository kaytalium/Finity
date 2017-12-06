<?php //session_start();
    
    include '../lib/Finity/Autoloader.php';
    $pm = new \Finity\Profile\ProfileManager();

    $user = (isset($_SESSION['user'])?$_SESSION['user']:'');
    $pwd  = (isset($_GET['password'])?$_GET['password']:'');


    if(!empty($user)){
        //print_ra($pm->setPassword($user, $pwd));
        if($pm->setPassword($user, $pwd))
            echo "Password Successfully Changed.";
        else
            echo "There was a problem changing your password";
    }
 