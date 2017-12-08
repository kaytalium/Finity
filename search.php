<?php  
    //Improve application library 
    require_once 'lib/Finity/Autoloader.php';
    hasAccess();
    if(isset($_SESSION['userType']) && $_SESSION['userType'] !=222)
        header('Location: product.php');

    $prolist= new \Finity\Product\ItemManager();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/font/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/finity.css">
        <link rel="stylesheet" href="css/search.css">

        <title>Admin</title>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/details-controller.js"></script>
    </head>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        $isSearch = false;
        $isProfile = false;

        $requestor = (isset($_GET['v'])?$_GET['v']:'');
        switch($requestor){

            case 'search':
            $isSearch = true;
            break;

            case 'user-profile':
            $isProfile = true;
            break;

            default:
            $isSearch = true;

        }

    }
?>
    <body>
        <div class="wrapper">
            <div class="header">
                <?php include 'header.php'; ?>
            </div>

            <div class="content search_result">
            <?php 
                if($isSearch)
                include 'product/search.php';

                if($isProfile)
                include 'user/profile.php';
            ?>
            </div>
        
            <div class="footer">
                <?php include 'footer.php';?>
            </div>
        </div>
    </body>
</html>