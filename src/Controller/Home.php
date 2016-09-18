<?php

namespace Task\Controller;

class Home
{
    public function index()
    {
        return [
            'template' => 'home/index.php'
        ];
    }

}