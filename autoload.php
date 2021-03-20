<?php

require __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($class) {

    $direction = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($direction)) {
        require $direction;
    }
});
