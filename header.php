<?php 
$img_url = (isset($_SESSION['image_url'])?$_SESSION['image_url']:"users/profile/default.png");
if(isset($_GET['searchbox'])){
    $searchWord = strtolower((isset($_GET["searchbox"])?$_GET["searchbox"]:''));
    $_SESSION['searchWord'] = $searchWord;
}

?>
<link rel="stylesheet" href="css/header.css" />
<div class="header1">
    <logo>
        <img src ="image/logo.png" id="logo">
        <div class="co-name">Finity<br> Inventory<br> System</div>
    </logo>

    <search>
        <form action="search.php">
            <input type="text" id="searchbox" name="searchbox" placeholder="Search for items here: e.g Soccer"
            value="<?php echo (isset($searchWord)?$searchWord:''); ?>">
        </form>
    </search>

    <menunav>
        <ul>
            <?php 
            if(isset($_SESSION['userType']) && $_SESSION['userType']==222){
                echo '<li><a href="admin.php">Admin</a></li>';
                echo '<li><a href="report.php">Report</a></li>';
            }
                
            ?>
            <li><a href="product.php">Products</a></li>
            
        </ul>
    </menunav>
   
    <profile>
        <div class="profile-holder" title="Your Profile">
            <a href="<?php echo $_SERVER["PHP_SELF"]."?v=user-profile";?>">
                <img src="image/<?php echo $img_url; ?>"/>
            </a>
        </div> 
        <div class="info">
            Hello, <?php echo (isset($_SESSION['fname'])?$_SESSION['fname']:'user'); ?>           
        </div>
        <div class="logout">
        <a href="functions/logout.php"><i class="fa fa-sign-out fa-lg" aria-hidden="true" title="logout">Logout</i><p class ="text"></p></a>
        </div>
    </profile>
</div> 