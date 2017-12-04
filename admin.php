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
    <link rel="stylesheet" href="css/font/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/finity.css">
    <link rel="stylesheet" href="css/admin.css">

    <title>Admin</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/details-controller.js"></script>
</head>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $isList = false;
        $isMod = false;
        $isCreate = false;
        $isProfile = false;

        $requestor = (isset($_GET['v'])?$_GET['v']:'');
        switch($requestor){
            case 'list':
            $isList = true;
            break;

            case 'edit':
            $isMod = true;
            break;

            case 'create':
            $isCreate = true;
            break;

            case 'delete':
            //call some function to delete user
            $isList = true;
            break;

            case 'suspend':
            //call some function to suspend user
            $isList = true;
            break;

            case 'user-profile':
            $isProfile = true;
            break;

            default:
            $isList = true;

        }

    }
?>

<body>
    <div class="wrapper">
        <div class="header">
            <?php include 'header.php'; ?>
        </div>

        <div class="content">
            <?php 
                if($isList)
                include 'user/user_list.php';
            
                if($isMod || $isCreate)
                include 'user/user_modify.php';

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