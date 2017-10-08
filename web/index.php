<?php
use app\core\Router;

define('ROOT', __DIR__);

require __DIR__ . '/../vendor/autoload.php';

$router = new Router(ROOT . '/../app/config/routes.php');
$router->run();