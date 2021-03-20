<?php

namespace App;


abstract class Model
{


    public const TABLE = '';

    public function __construct( array $data = [] )
    {
        foreach ($data as $key=>$value) 
        {
             $this->$key = $value;
        }
    }


    public static function findAll()
    {
        $db = Db::instance();
        $request =  'SELECT * FROM ' . static::TABLE;

        return $db->queryEach(
            $request,
            [],
            static::class
        );

    }


    public function save()
    { 
       
        $props = get_object_vars($this);

       


        if (isset($props['id']) && $props['id']  > 0) {
            
            return $this->update($props);
            
        } else {
            return $this->insert($props);
        }
    }

    protected function insert($props)
    {

        $columns = [];
        $binds = [];
        $data = [];


        foreach ($props as $key => $value) {
            $columns[] = $key;
            $binds[] = ':' . $key;
            $data[':' . $key] = $value;
        }





        $sql = 'INSERT INTO ' . static::TABLE .
            '  (' . implode(',', $columns) . ') 
        VALUES (' . implode(',', $binds) . ')';
        $db = Db::instance();

        $db->execute($sql, $data);
        $this->id = $db->lastId();
    }

    protected function update($props)
    {
        
       
        $id = [];
        $binds = [];
        $data = [];




        
        foreach ($props as $key => $value) {

           if($key == 'id') {
                $id[] = $key.'= :'.$key; 
           }else{ 
                $binds[] = $key.' = :'.$key;
           }

           $data[':' . $key] = $value;
        }


        

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(',', $binds) . ' WHERE ' . implode(',', $id);  

       
        $db = Db::instance();
        $db->execute($sql, $data);
        

        return $db;
    }

    public function delete($id)
    {
        $data[':id'] = $id;
        $sql = 'DELETE FROM '.static::TABLE.' WHERE id =:id';
        $db = Db::instance();
        $db->execute($sql, $data);

        return $db;
    }
}
