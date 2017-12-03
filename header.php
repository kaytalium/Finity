<link rel="stylesheet" href="css/header.css" />
<div class="header1">
    <logo>
        <img src ="image/logo.png" id="logo">
        <div class="co-name">Finity<br> Inventory<br> System</div>
    </logo>

    <search>
        <form action="">
            <input type="text" name="searchbox" placeholder="Search for items here: e.g Soccer">
        </form>
    </search>

    <menunav>
        <ul>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="product.php">Products</a></li>
            <li><a href="report.php">Report</a></li>
        </ul>
    </menunav>
   
    <profile>
        <div class="profile-holder" title="Your Profile">
            <a href="<?php echo $_SERVER["PHP_SELF"]."?v=user-profile";?>">
                <img src="image/users/default.png"/>
            </a>
        </div> 
        <div class="info">
            Hello, Kelly           
        </div>
        <div class="logout">
        <a href="#"><i class="fa fa-sign-out fa-lg" aria-hidden="true" title="logout">Exit</i><p class ="text"></p></a>
        </div>
    </profile>
</div> 