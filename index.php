<?php
    //Improve application library 
    require_once 'lib/Finity/Autoloader.php';
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/finity.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Inventory Management System</title>
</head>
<?php
    $islogin = false;
    $isSignup = false;

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        $requestor = (isset($_GET['v'])?$_GET['v']:'');
        switch($requestor){
            case 'signup':
            $isSignup = true;
            break;

            case 'login';
            $islogin = true;
            break;

            default:
            $islogin = true;
        }
    }else{
        $islogin = true;
    }
?>

    <body>
        <?php 
            if($islogin)
            include 'login/login.php';

            if($isSignup)
            include 'login/signup.php';

        ?>

    </body>
</html>