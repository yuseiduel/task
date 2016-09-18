<?php

namespace Task;

class Request
{
    private $routes;

    public function __construct()
    {
        $this->routes = new Routes();
    }

    public function handle()
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 'home';
        }

        $route = $this->routes->getRoute($page);

        if (count($route['values']) === 0) {
            $controller = new $route['controller']();
            return $controller->$route['action']();
        }

        $values = [];
        foreach ($route['values'] as $value) {
            if (isset($_GET[$value])) {
                $values[$value] = $_GET[$value];
            } else {
                $errorRoute = $this->routes->getErrorRoute();

                $controller = new $errorRoute['controller']();

                return $controller->$errorRoute['action']();
            }
        }

        $controller = new $route['controller']();

        return $controller->$route['action']($values);
    }
}