<?php

namespace App\Controllers;

use App\Exceptions\Http404Exception;
use App\Models\Article;
use Exception;


class Admin extends BaseController
{


    public function __invoke()
    {

        if (isset($_GET['id'])) {

            if (isset($_POST) && !empty($_POST)) {

                $article = new Article();


                foreach ($_POST as $key => $elem) {
                    if ($key == 'author_id') {
                        $article->author_id = Article::findOne($elem);
                        continue;
                    }
                    $article->$key = $elem;
                }


                $article->save();
            }


            $article = Article::findOne($_GET['id']);
            if(empty($article)) {
                throw new Http404Exception();
            }
            $this->view->article = $article;

            $this->view->display(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Templates' . DIRECTORY_SEPARATOR . 'article.php');
        } else {

            $news = Article::findAll(); 
           
            $this->view->news = $news;
            $this->view->display(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Templates' . DIRECTORY_SEPARATOR . 'news.php');
        }
    }
}
