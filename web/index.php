<?php
use app\core\Router;

require __DIR__ . '/../vendor/autoload.php';

$router = new Router(__DIR__ . '/app/config/routes.php');
$router->run();