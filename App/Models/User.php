<?php

namespace App\Models;

use App\Model;

class User extends Model
{

    public const TABLE = 'users';

    public $title;
    public $content;


    public function getFuncName()
    {
        return 'пользователи';
    }
}