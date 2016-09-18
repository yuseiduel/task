<?php

namespace Task\Model;

use Task\Database\Repository;

class OrderItemRepository extends Repository
{
    public function all()
    {
        $result = $this->getRows("SELECT * FROM order_items");

        $list = [];
        foreach ($result as $item) {
            $list[] = new OrderItem(
                $item['id'],
                $item['ean'],
                $item['quantity'],
                $item['price'],
                $item['order_id']
            );
        }

        return $list;
    }

    public function find($id)
    {
        $result = $this->getSingleRow("SELECT * FROM order_items WHERE id = " . $id);

        if (empty($result)) {
            return null;
        }

        return new OrderItem(
            $result['id'],
            $result['ean'],
            $result['quantity'],
            $result['price'],
            $result['order_id']
        );
    }

    public function getRevenueByDate($fromDate, $toDate)
    {
        return $this->getField(
            "SELECT COALESCE(SUM(order_items.price * order_items.quantity), 0) FROM order_items
                INNER JOIN orders ON orders.id = order_items.order_id
                WHERE orders.purchase_date >= '" . $fromDate . "' 
                AND orders.purchase_date <= '" . $toDate .  "'"
        );
    }
}