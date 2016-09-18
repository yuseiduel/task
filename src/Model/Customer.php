<?php

namespace Task\Model;

class Customer
{
    public $id;
    public $firstName;
    public $lastName;
    public $email;

    public function __construct($id, $firstName, $lastName, $email)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }
}