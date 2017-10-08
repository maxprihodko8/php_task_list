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
        $this->routes = include ($routesPath);
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

    public function run()
    {
        $this->getURI();
    }
}