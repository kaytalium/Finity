<?php
require_once '../lib/Finity/Autoloader.php';
    // echo '<tr>
    //     <td>Dell-12345</td>
    //     <td>Computer</td>
    //     <td>Dell</td>
    //     <td>Laptop</td>
    //     <td>10</td>
    //     <td>$price</td>
        
    // </tr>';
    $im = new \Finity\Product\ItemManager;
    $result = $im->adhocReport($_GET);

     
         echo json_encode($result);
     