<?php

// Start PHP session
session_start();

use DI\Container;
use Dotenv\Dotenv;
use Slim\Views\Twig;
use Slim\Flash\Messages;
use Stripe\StripeClient;

use App\Views\EnvExtension;
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;
use App\Controllers\HomeController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

AppFactory::setContainer($container = new Container());

// Set view in Container
$container->set('view', function () {
    $twig = Twig::create(__DIR__ . '/../resources/views', ['cache' => false]);

    //Enable Whatever you like here even add extensions
    $twig->addExtension(new EnvExtension());

    return $twig;
});

$container->set('stripe', function () {
    return new StripeClient($_ENV['STRIPE_SECRET']);
});

$container->set('flash', function () {
    return new Messages();
});

//dump( new HomeController());

$app = AppFactory::create();
$app->add(TwigMiddleware::createFromContainer($app));

require_once __DIR__ . '/../routes/web.php';

require_once __DIR__ . '/database.php';
