<?php

namespace Task;

use Task\Controller\Dashboard;
use Task\Controller\Error;
use Task\Controller\Home;

class Routes
{
    private $routes = [
        'home' => [
            'controller' => Home::class,
            'action' => 'index',
            'values' => []
        ],
        'dashboard' => [
            'controller' => Dashboard::class,
            'action' => 'index',
            'values' => []
        ],
        'dashboard-data' => [
            'controller' => Dashboard::class,
            'action' => 'data',
            'values' => ['from', 'to']
        ]
    ];

    private $errorRoute = [
        'controller' => Error::class,
        'action' => 'index',
        'values' => []
    ];

    public function __construct()
    {

    }

    public function getRoute($name)
    {
        if (isset($this->routes[$name])) {
            return $this->routes[$name];
        } else {
            return $this->errorRoute;
        }
    }

    public function getErrorRoute()
    {
        return $this->errorRoute;
    }
}