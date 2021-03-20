<?php

namespace App;

use Countable;

class View implements Countable
{
    use ViewTrait;

    public array $data = [];
   

    /**
     * $template  - путь до шаблона
     */

    public function display(string $template)
    {
        include $template;
    }


    public function render(string $template)
    {
        ob_start(); // output buder
        include $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public function count()
    {
        return count($this->data);
    }
}
