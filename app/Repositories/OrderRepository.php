<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Utils\OaRepository;

class OrderRepository implements OrderRepositoryInterface
{
    public function store(array $order): Order
    {
        $new_order = new Order();

        $new_order->total = OaRepository::store($order, 'total');
        $new_order->customer_name = OaRepository::store($order, 'customer_name');
        $new_order->customer_surname = OaRepository::store($order, 'customer_surname');
        $new_order->status = OaRepository::store($order, 'status');

        $new_order->save();

        return $new_order;
    }

    public function update(
        int   $order_id,
        array $order): Order
    {
        $db_order = Order::find($order_id);

        $db_order->total = OaRepository::update($order, 'total', $db_order);
        $db_order->customer_name = OaRepository::update($order, 'customer_name', $db_order);
        $db_order->customer_surname = OaRepository::update($order, 'customer_surname', $db_order);
        $db_order->status = OaRepository::update($order, 'status', $db_order);

        $db_order->save();

        return $db_order;
    }
}
