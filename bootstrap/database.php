<?php

use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule();

$capsule->addConnection([
    'driver' => 'pgsql',
    'host' => 'localhost',
    'database' => 'who-paid-db',
    'username' => 'postgres',
    'password' => 'Qwerty1!',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->bootEloquent();
