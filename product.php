<?php
require __DIR__ . '/showErrors.php';

require __DIR__ . '/autoload.php';

use App\Controllers\Product;
use App\Exceptions\Http404Exception;

try {

    $product = new Product();
    return $product();
} catch (Http404Exception $ex) {
    http_response_code(404);
}


