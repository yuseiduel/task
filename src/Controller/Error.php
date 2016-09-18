<?php

namespace Task\Controller;

class Error
{
    public function index()
    {
        return [
            'template' => 'error.php'
        ];
    }
}