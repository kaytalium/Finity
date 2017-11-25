<?php

spl_autoload_register(function($class) {
    if (strpos($class, "Finity\\") === 0) {
        $path = str_replace('Finity', '', $class);

        $path = __DIR__.str_replace('\\', '/', $path).'.php';

        require_once $path;
    }
});
require_once 'helper.php';
?>