<?php

namespace App;

use App\Exceptions\Http500Exception;
use ArrayObject;
use Exception;

class Db
{

    protected static $instance = null;

    protected $dbh;


    public static function instance()
    {
        if(self::$instance == null) 
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    protected function __construct()
    {
        
        $config = Config::instance();

        $this->dbh = new \PDO(
            'mysql:
        host=' .$config->data['host'] .
                ';dbname=' . $config->data['dbname'],
                $config->data['user'],
                $config->data['password']
        );
    }

    public function query($query, $data = [], $class)
    {
        $sth = $this->dbh->prepare($query); // Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект
        $data = $sth->execute($data); // потом используя этот объект $sth сделаем запрос к БД , метод execute возвращает bool    

        if(!$data) 
        {
            throw new Http500Exception('ошибка запроса' . $query);
        }


        $data = $sth->fetchAll(\PDO::FETCH_CLASS, $class); // а потом получает их обратно // вот он делает все что дает код снизу получает данные из базы а потом элементы таблицы сделает свойствами класса .



        // $res = [];

        // foreach($data as $row) {
        //     $item = new $class;

        //     foreach($row as $key=>$value) {
        //         if(is_numeric($key)) continue;

        //         $item->$key = $value;

        //     }
        //     $res[] = $item; // вот это массив объектов 
        // }

        // return $res;

        return $data;
    }

    public function queryEach($query, $data = [], $class)
    {   
        $sth = $this->dbh->prepare($query);
        $data = $sth->execute($data);

        $sth->setFetchMode(\PDO::FETCH_CLASS,$class);


        $data = new ArrayObject([]);


        while($elem = $sth->fetch()) {
            $data->append($elem);
        }


        
        return $data;
        

        // die(print_r($data, 1));
    }

    public function execute($sql, $data):bool
    {   
        $sth = $this->dbh->prepare($sql);  
        return $sth->execute($data);  
    }


    public function lastId()
    {
        return $this->dbh->lastInsertId();
    }
}
