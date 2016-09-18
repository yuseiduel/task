<?php

namespace Task\Model;

class Order
{
    public $id;
    public $purchaseDate;
    public $country;
    public $device;
    public $customerId;

    public function __construct($id, $purchaseDate, $country, $device, $customerId)
    {
        $this->id = $id;
        $this->purchaseDate = $purchaseDate;
        $this->country = $country;
        $this->device = $device;
        $this->customerId = $customerId;
    }
}