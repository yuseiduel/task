<?php

namespace Task\Controller;

use DateTime;
use Task\Model\CustomerRepository;
use Task\Model\OrderItemRepository;
use Task\Model\OrderRepository;

class Dashboard
{
    public function index()
    {
        $firstDay = new DateTime("first day of last month");
        $lastDay = new DateTime("last day of last month");

        return [
            'template' => 'dashboard/index.php',
            'data' => [
                'firstDay' => $firstDay->format('Y-m-d'),
                'lastDay' => $lastDay->format('Y-m-d')
            ]
        ];
    }

    public function data($params)
    {
        $order = new OrderRepository();
        $totalOrders = $order->getTotalByDate($params['from'], $params['to']);

        $orderItem = new OrderItemRepository();
        $revenue = $orderItem->getRevenueByDate($params['from'], $params['to']);

        $customer = new CustomerRepository();
        $totalCustomers = $customer->getTotalByOrderDate($params['from'], $params['to']);

        return [
            'template' => 'json.php',
            'data' => [
                'orders' => $totalOrders,
                'revenue' => $revenue,
                'customers' => $totalCustomers
            ]
        ];
    }
}