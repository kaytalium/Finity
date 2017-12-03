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
    <script src="js/details-controller.js"></script>
</head>
<?php
    $isList = false;
    $isMod = true;
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
            
                if($isMod)
                include 'user/user_modify.php';
            ?>
            
        </div>

        <div class="footer">
            <?php include 'footer.php';?>
        </div>
        
    </div>
</body>

</html>