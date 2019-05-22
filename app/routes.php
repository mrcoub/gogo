<?php

use Slim\Http\Request;
use Slim\Http\Response;

use App\Controllers;

$app->get('/demo', function (Request $request, Response $response, array $args) use ($container) {
    return $container->get('renderer')->render($response, 'index.phtml', $args);
});