<?php 

namespace App;

abstract class Model 
{

    public $id;
    public const TABLE = '';


    public static function findAll() 
    {
        $db = new Db();

        // $class = get_called_class(); используется static вместо этого
        

        $query = 'SELECT * FROM '. static::TABLE;
        return $db->query($query, [], static::class);
    }


    abstract public function getFuncName();
}