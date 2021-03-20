<?php

namespace App;

class Config
{
    public $data;
    private static $insatance = null;

    public static function instance()
    {
        if(self::$insatance == null) 
        {
          self::$insatance = new self();
        }
        
        return self::$insatance;
    }

    protected function __construct()
    {
        $this->data = (include __DIR__ . '/../config.php')['db'];   
    }
}
