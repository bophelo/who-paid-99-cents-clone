<?php

// Start PHP session
session_start();

use DI\Container;
use Slim\Views\Twig;
use Slim\Flash\Messages;
use Stripe\StripeClient;
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;
use App\Controllers\HomeController;

require_once __DIR__ . '/../vendor/autoload.php';

AppFactory::setContainer($container = new Container());

// Set view in Container
$container->set('view', function () {
    return Twig::create(__DIR__ . '/../resources/views', ['cache' => false]);
});

$container->set('stripe', function () {
    return new StripeClient('sk_test_51IDSXiCZy8Ivjitoz1nLkwrVCkjTrsEMPhQn7lCM9OLNRVaLJfzhy8gaG9z9CCxBfssOVwkCm35FDE8EfMByqirn00FGtncbWo');
});

$container->set('flash', function () {
    return new Messages();
});

//dump( new HomeController());

$app = AppFactory::create();
$app->add(TwigMiddleware::createFromContainer($app));

require_once __DIR__ . '/../routes/web.php';

require_once __DIR__ . '/database.php';
