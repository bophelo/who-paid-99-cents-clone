<?php

use App\Controllers\HomeController;
use App\Controllers\PaymentsController;

/*$app->get('/', function (Request $request, Response $response) {
    return $response;
});*/

$app->get('/', HomeController::class);
$app->post('/payments', PaymentsController::class);

