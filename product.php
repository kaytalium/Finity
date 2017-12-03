<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/font/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/finity.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="css/sidebar.css">
    

    <title>Product</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/details-controller.js"></script>
    
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <?php
                require_once 'lib/Finity/Autoloader.php';
                $prolist= new \Finity\Product\ItemManager();

                if($_SERVER['REQUEST_METHOD'] == 'GET'){
                    if(empty($_GET)){
                        $_GET['v'] = 'catreq';
                    }
                $iscat = false;
                $isitem = false;
                $isProfile = false;
                $requester = (isset($_GET['v'])?$_GET['v']:'');

                switch($requester){
                    case "catreq": 
                    $selectedCat = (isset($_GET['q'])?$_GET['q']:'');
                    $iscat = true;
                    break;

                    case "itemreq":
                    $itemid = (isset ($_GET['c'])?$_GET['c']:'');
                    $isitem = true;
                    break;

                    case 'user-profile':
                    $isProfile = true;
                    break;

                    default: 
                    $selectedCat= "";
                    $iscat = true;
                }
                            
                }else{
                    $selectedCat = '';
                }
                include 'header.php';
            ?> 
        </div>
        <div class="content">
            <?php
                if($isitem)
                include 'product/details.php';

                if($iscat)
                include 'product/main_cat_list.php';

                if($isProfile)
                include 'user/profile.php';
            ?> 
        </div>

        <div class="footer">
            <?php
                include 'footer.php';
            ?>
        </div>
    </div>
</body>
</html>