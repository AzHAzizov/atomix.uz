<?php

namespace App;

Class Db 
{
    protected $dbh;

    public function __construct()
    {
            $config = (include(__DIR__. '/../config.php'))['db'];
            $this->dbh = new \PDO(
                'mysql:host='. $config['host'] . ';dbname='. $config['dbname'], 
                $config['user'], 
                $config['password']
            );
    }


    public function query($sql, $data, $class)
    {
        $sth = $this->dbh->prepare($sql); // подготавливаем запрос

        $sth->execute($data); // выполняем запрос с подготовленными заддыми

        return $sth->fetchAll(\PDO::FETCH_CLASS, $class); // получаем данные
        



        
        // $ret = [];


        // foreach($data as $elemTable) {

        //     $item = new $class;

        //     foreach($elemTable as $key=>$value) {

        //             if(is_numeric($key)) continue;

        //             $item->$key = $value;
        //     } 

        //     $ret[] = $item; 
        // }

        // return $ret;

    }
}