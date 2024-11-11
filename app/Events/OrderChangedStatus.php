<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderChangedStatus implements ShouldBroadcastNow
{
    use Dispatchable,
        InteractsWithSockets,
        SerializesModels;

    public Order $order;

    public function __construct(int $order_id)
    {
        $this->setOrder($order_id);
    }

    public function broadcastOn(): Channel
    {
        return new Channel('orders_status');
    }

    public function broadcastWith(): array
    {
        $order = $this->getOrder();

        return [
            'id' => $order->id,
            'customer_name' => $order->customer_name,
            'customer_surname' => $order->customer_surname,
            'status' => $order->status
        ];
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(int $order_id): void
    {
        $this->order = Order::find($order_id);
    }
}

