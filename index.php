<?php

require __DIR__. '/showErrors.php';
require __DIR__. '/autoload.php';



// $data = App\Models\Article::findAll();

$users = new App\Models\User;
$data = $users->findAll();

echo '<pre>' . print_r($data, 1) .'</pre>';



