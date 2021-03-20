<?php

namespace App\Models;

use App\Model;
use Exception;
use Exceptions\Http404NotFound;

class Article extends Model implements HasPriceInterface, HasTitle
{
    use HasPriceTrait;

    public const TABLE = 'news';


    public $title;
    public $text;
    public $author_id;


    public function getTitle(): string
    {
        return '1.25';
    }

    public static  function findAll()
    {
        $articles = parent::findAll();
        foreach ($articles as $article) {
            if (isset($article->author_id)) {
                $article->author_id =  Author::getOne($article->author_id);
            }
        }


        return $articles;
    }


    public static function findOne($id)
    {
        $articles = parent::findAll();

        foreach ($articles as $article) {
            if ($article->id == $id) {
                $article->author_id =  Author::getOne($article->author_id);
                return $article;
            } else {

                return Author::getOne($id);
            }
            continue;
        }
    }

    public static function saveLog($data, $key)
    {
        $result = file_put_contents(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'logs.log', $key . '__' . print_r($data, 1));
        return (bool) $result;
    }
}
