<?php

namespace app\core;

class Router
{
    private $routes;

    /**
     * Router constructor.
     * @param $routesPath
     * constructor of router of application with router config file path
     */
    public function __construct($routesPath) {
        $this->routes = include($routesPath);
    }

    /**
     * @return string
     *
     * Gets uri from request
     */
    public function getURI() {
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }

        if(!empty($_SERVER['PATH_INFO'])) {
            return trim($_SERVER['PATH_INFO'], '/');
        }

        if(!empty($_SERVER['QUERY_STRING'])) {
            return trim($_SERVER['QUERY_STRING'], '/');
        }
        return '/';
    }


    public function run() {
        $uri = $this->getURI();

        foreach($this->routes ?? [] as $pattern => $route) {
            if (preg_match("~$pattern~", $uri)) {
                $internalRoute = preg_replace("~$pattern~", $route, $uri);
                $segments = explode('/', $internalRoute);
                $controller = ucfirst(array_shift($segments)) . 'Controller';
                $action = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;

                $controllerFile = ROOT . '/../src/controllers/' . $controller . '.php';
                if(file_exists($controllerFile)) {
                    include $controllerFile;
                }

                $fullControllerPath = '\src\controllers\\' . $controller;
                $controllerInstance = new $fullControllerPath;

                if(!is_callable([$controllerInstance, $action])) {
                    header("HTTP/1.0 404 Not Found");
                    return;
                }
                return call_user_func_array(array($controllerInstance, $action), $parameters);

            }
        }

        header("HTTP/1.0 404 Not Found");
        return;
    }
}