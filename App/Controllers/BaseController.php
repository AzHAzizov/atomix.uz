<?php 

namespace App\Controllers;

use App\View;

abstract class BaseController 
{
    protected View $view;

    public function __construct()
    {   

        if(!$this->access()) die('доступа нет');

        $this->view = new View;
    }

    protected function access() : bool 
    {
        return true;
    }


    abstract public function __invoke();
}