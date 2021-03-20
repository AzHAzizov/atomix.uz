<?php

use App\Exceptions\Http404Exception;
use App\Exceptions\Http500Exception;

require __DIR__ . '/showErrors.php';

require __DIR__ . '/autoload.php';


$ctrl = $_GET['ctrl'] ?? 'Index';

$class = '\\App\\Controllers\\' . $ctrl;


if (!class_exists($class)) {
    die('Страница не найдено');
}


try {
    $ctrl = new $class;
    $ctrl();
} catch (Http404Exception $e) {
    http_response_code(404);
} catch (Http500Exception $e) {
    http_response_code(500);
}catch( Throwable $ex ) {
    echo get_class($ex);
}
