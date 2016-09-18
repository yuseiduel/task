<?php

namespace Task\Model;

class OrderItem
{
    public $id;
    public $ean;
    public $quantity;
    public $price;
    public $orderId;

    public function __construct($id, $ean, $quantity, $price, $orderId)
    {
        $this->id = $id;
        $this->ean = $ean;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->orderId = $orderId;
    }
}