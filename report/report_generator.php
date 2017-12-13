<?php
require_once '../lib/Finity/Autoloader.php';
    $im = new \Finity\Product\ItemManager;
    $result = $im->adhocReport($_GET);

         echo json_encode($result);     