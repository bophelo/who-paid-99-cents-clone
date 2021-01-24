<?php

use App\Controllers\HomeController;
use DI\Container;
use Slim\Views\Twig;
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';

AppFactory::setContainer($container = new Container());

// Set view in Container
$container->set('view', function () {
    return Twig::create(__DIR__ . '/../resources/views', ['cache' => false]);
});

/*$container->set('stripe', function () {
    return 'Stripe';
});*/

//dump( new HomeController());

$app = AppFactory::create();
$app->add(TwigMiddleware::createFromContainer($app));

require_once __DIR__ . '/../routes/web.php';

require_once __DIR__ . '/database.php';
