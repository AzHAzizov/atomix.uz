<?php

namespace App\Models;

use App\Model;

class Author extends Model
{
    public const TABLE = 'authors';


    public static function getOne($id)
    {

        $authors = self::findAll();


        foreach ($authors as $author) {
            if ($author->id == $id) {
                return $author->name;
            } elseif ($author->name == $id) {
                return $author->id;
            } else {
               continue;
            }
        }
    }
}
