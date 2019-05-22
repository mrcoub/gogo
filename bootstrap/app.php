<?php

define('APP_ROOT', __DIR__ . '/..');

require APP_ROOT . '/vendor/autoload.php';

session_start();

$dotenv = new \Dotenv\Dotenv(APP_ROOT);
$dotenv->load();

$settings = require APP_ROOT . '/app/settings.php';
$app = new \Slim\App($settings);

require APP_ROOT . '/app/dependencies.php';
require APP_ROOT . '/app/middleware.php';
require APP_ROOT . '/app/routes.php';

return $app;