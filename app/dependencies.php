<?php

use Psr\Container\ContainerInterface;

$container = $app->getContainer();

//Logger
$container['logger'] = function (ContainerInterface $container) {
    $settings = $container->get('settings')['logger'];

    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\RotatingFileHandler($settings['path'], Monolog\Logger::DEBUG));
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushProcessor(new Monolog\Processor\WebProcessor());
    $logger->pushProcessor(new Monolog\Processor\MemoryUsageProcessor());

    return $logger;
};

//view
$container['renderer'] = function (ContainerInterface $container) {
    $settings = $container->get('settings')['renderer'];
    return new \Slim\Views\PhpRenderer($settings['template_path']);
};

//connect db
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container->get('settings')['db']);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function (ContainerInterface $container) use ($capsule) {
    return $capsule;
};