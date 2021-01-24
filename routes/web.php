<?php

use App\Controllers\HomeController;

/*$app->get('/', function (Request $request, Response $response) {
    return $response;
});*/

$app->get('/', HomeController::class);
