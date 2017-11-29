<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/product.css">
    <title>Product</title>
</head>
<body>
    <div class="item-wrapper">
        <!-- this floats to the left with categories -->
        <div class="sidebar">
            this is sidebar
            <div class="catlist">
                call for the categories 
            </div>
        </div> 

        <!-- area for items to display to user-->
        <div class="item-container">
            <?php include 'product/list.php'; ?>
        </div>

    </div>
</body>
</html>