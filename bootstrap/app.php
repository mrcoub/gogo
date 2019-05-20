<?php

require __DIR__.'/../vendor/autoload.php';

session_start();

$settings = require APP_ROOT . '/app/settings.php';
$app = new \Slim\App($settings);

$container = $app->getContainer();

require APP_ROOT . '/app/dependencies.php';
require APP_ROOT . '/app/middleware.php';
require APP_ROOT . '/app/routes.php';

return $app;