<?php

return [
    'settings' => [
        'displayErrorDetails' => getenv('APP_DEBUG') === 'true',
        'addContentLengthHeader' => false,
        'renderer' => [
            'template_path' => APP_ROOT . '/templates/',
        ],
        'logger' => [
            'name' => 'app',
            'path' => APP_ROOT . '/logs/app.log',
        ],
        'db' => [
            'driver' => getenv('DB_DRIVER'),
            'host' => getenv('DB_HOST'),
            'database' => getenv('DB_NAME'),
            'username' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
            'charset' => getenv('DB_CHARSET'),
            'collation' => getenv('DB_COLLATION'),
            'prefix' => getenv('DB_PREFIX'),
        ]
    ]
];