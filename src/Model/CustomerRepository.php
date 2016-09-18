<?php

namespace Task\Model;

use Task\Database\Repository;

class CustomerRepository extends Repository
{
    public function all()
    {
        $result = $this->getRows("SELECT * FROM customers");

        $list = [];
        foreach ($result as $item) {
            $list[] = new Customer(
                $item['id'],
                $item['fist_name'],
                $item['last_name'],
                $item['email']
            );
        }

        return $list;
    }

    public function find($id)
    {
        $result = $this->getSingleRow("SELECT * FROM customers WHERE id = " . $id);

        if (empty($result)) {
            return null;
        }

        return new Customer(
            $result['id'],
            $result['fist_name'],
            $result['last_name'],
            $result['email']
        );
    }

    public function getTotalByOrderDate($fromDate, $toDate)
    {
        return $this->getField(
            "SELECT COUNT(customers.id) FROM customers
                INNER JOIN orders ON orders.customer_id = customers.id
                WHERE orders.purchase_date >= '" . $fromDate . "' 
                AND orders.purchase_date <= '" . $toDate .  "'"
        );
    }
}