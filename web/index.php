<?php
use app\core\Router;

/*error_reporting(E_ALL);
ini_set("display_errors","On");*/

define('ROOT', __DIR__);

require __DIR__ . '/../vendor/autoload.php';

$router = new Router(ROOT . '/../app/config/routes.php');
$response = $router->run();
echo $response;
