<?php

namespace Task\Model;

use Task\Database\Repository;

class OrderRepository extends Repository
{
    public function all()
    {
        $result = $this->getRows("SELECT * FROM orders");

        var_dump($result);

        $list = [];
        foreach ($result as $item) {
            $list[] = new Order(
                $item['id'],
                $item['purchase_date'],
                $item['country'],
                $item['device'],
                $item['customer_id']
            );
        }

        return $list;
    }

    public function find($id)
    {
        $result = $this->getSingleRow("SELECT * FROM orders WHERE id = " . $id);

        if (empty($result)) {
            return null;
        }

        return new OrderItem(
            $result['id'],
            $result['purchase_date'],
            $result['country'],
            $result['device'],
            $result['customer_id']
        );
    }

    public function getTotalByDate($fromDate, $toDate)
    {
        return $this->getField(
            "SELECT COUNT(id) FROM orders 
                WHERE purchase_date >= '" . $fromDate . "' 
                AND purchase_date <= '" . $toDate .  "'"
        );
    }
}