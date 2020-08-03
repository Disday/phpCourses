<?php
namespace App\Main;
require __DIR__ . '/../../../vendor/autoload.php';

use App\Logger;
use App\Application;
use App\LoggerInterface;

function buildApplication()
{
    
}
// $container = new \DI\Container();
// $container->set(LoggerInterface::class, \DI\autowire(Logger::class));
// $container->set(Application::class, \DI\autowire(Application::class));
// $obj = $container->get(Application::class);
$builder = new \DI\containerBuilder();
$builder->addDefinitions([
    // 'App' => \DI\autowire(Application::class),
    LoggerInterface::class => \Di\autowire((Logger::class))
]);
$container = $builder->build();
$app = $container->get(Application::class);
var_dump($app);