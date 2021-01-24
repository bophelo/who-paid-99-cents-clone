<?php

return [
    'migration_dirs' => [
        'main' => __DIR__ . '/database/migrations',
    ],
    'environments' => [
        'local' => [
            'adapter' => 'pgsql',
            'host' => 'localhost',
            'port' => 5432, // optional
            'username' => 'postgres',
            'password' => 'Qwerty1!',
            'db_name' => 'who-paid-db',
            'charset' => 'utf8',
        ],
    ],
    'default_environment' => 'local',
    'log_table_name' => 'phoenix_log',
];