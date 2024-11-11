<?php

namespace App\Repositories\Contracts;

use App\Models\Order;

interface OrderRepositoryInterface
{
    public function store(
        array $order
    ): Order;

    public function update(
        int   $order_id,
        array $order
    ): Order;
}
