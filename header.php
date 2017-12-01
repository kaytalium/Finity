<link rel="stylesheet" href="css/header.css" />
<div class="header">
    <logo>
        <img src ="image/logo.png" id="logo">
        <div class="co-name">Finity<br> Inventory<br> System</div>
    </logo>

    <menu>
        <ul>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="product.php">Product</a></li>
        </ul>
    </menu>
   
    <profile>
        <div class="profile-holder">
            <img src="image/users/default.png"/>
        </div> 
        <div class="logout">

        </div>
        <profile-detail>
            <?php include 'user/update.php'; ?>
        </profile-detail>
    </profile>
</div> 