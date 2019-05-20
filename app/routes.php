<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
    return $container->get('renderer')->render($response, 'index.phtml', $args);
});