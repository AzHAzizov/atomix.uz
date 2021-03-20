<?php

namespace App\Controllers;

use App\View;

class Index
{
    public function __invoke()
    {
        $view = new View();
        $data = (include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data.php')['services'];
        $view->services = $data;
        $view->display(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Templates' . DIRECTORY_SEPARATOR . 'index.php');
    }
}
