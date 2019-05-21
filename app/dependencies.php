<?php

use Psr\Container\ContainerInterface;

$container = $app->getContainer();

//Error Handle
//$container['errorHandler'] = function ($c) {
//    if ($c->get('settings')['mode'] !== 'development') {
//        return function ($request, $response, $exception) use ($c) {
//            return $c->get('view')->render('errors/500', [
//                'message' => $exception->getMessage()
//            ])->withStatus(500);
//        };
//    }
//    return new SlimError(true);
//};
//
//$container['notFoundHandler'] = function ($c) {
//    return function ($request, $response) use ($c) {
//        return $c->view->render($response, 'errors/404.twig')->withStatus(404);;
//    };
//};

//Logger
$container['logger'] = function (ContainerInterface $c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\RotatingFileHandler($settings['path'], Monolog\Logger::DEBUG));
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushProcessor(new Monolog\Processor\WebProcessor());
    $logger->pushProcessor(new Monolog\Processor\MemoryUsageProcessor());
    return $logger;
};

//view
$container['renderer'] = function (ContainerInterface $c) {
    $settings = $c->get('settings')['renderer'];
    return new \Slim\Views\PhpRenderer($settings['template_path']);
};

//connect db
$container['db'] = function (ContainerInterface $c) {
    $settings = $c->get('settings')['db'];

    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($settings);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

//validator
//$container['validator'] = function (ContainerInterface $c) {
//    $request = $c->get('request')->getParsedBody();
//    return new Valitron\Validator($request);
//};