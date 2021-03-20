<?php

namespace App\Controllers;

use App\Exceptions\Http404Exception;

class Product extends BaseController
{

    

    public function __invoke()
    {
        $data = (include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data.php')['services'];


        if(empty($data) || !isset($_GET['id'])) 
        {
            throw new Http404Exception('Продукты не найдены');
        }

        $this->view->product = $data[$_GET['id']];
        
        $this->view->display(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Templates' . DIRECTORY_SEPARATOR . 'product.php');
    }
    
}
