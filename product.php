<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/finity.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/font/css/font-awesome.min.css">

    <title>Product</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/details-controller.js"></script>
    <script src="js/profile-controller.js"></script>
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
            <div class="item-wrapper">
                <!-- this floats to the left with categories -->
                <div class="sidebar">
                    <div class="catlist">
                        <div class="title">Category</div>
                        <?php include 'product/category_list.php';?> 
                    </div>
                </div> 

                <!-- area for items to display to user-->
                <div class="item-container">
                    <?php
                        if($iscat)
                        include 'product/list.php';

                        if($isitem)
                        include 'product/details.php';
                    ?>
                    <div class="plus_btn">
                        <a href="#">
                            <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>    
        </div>

        <div class="footer">
            <?php
                include 'footer.php';
            ?>
        </div>
    </div>
</body>
</html>