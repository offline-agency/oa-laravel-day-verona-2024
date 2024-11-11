<?php

namespace App\Console\Commands;

use App\Enums\OrderStatusOptionsEnum;
use App\Events\OrderChangedStatus;
use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Console\Command;

class ChangeOrderStatus extends Command
{
    protected $signature = 'orders:change {id : The ID of the order to change the status}';

    protected $description = 'Change the status of an order';

    public function handle(
        OrderRepositoryInterface $orderRepository
    )
    {
        $order_id = $this->argument('id');
        $order = Order::find($order_id);

        if (!$order) {
            $this->error('Order #' . $order_id . ' not found');
            return;
        }

        $current_status = $order->status;

        switch ($current_status) {
            case 'new':
                $new_status = OrderStatusOptionsEnum::DELIVERING;
                $this->info('Start changing status of order #' . $order_id . ' from "new" to "delivering"');
                break;
            case 'delivering':
                $new_status = OrderStatusOptionsEnum::DELIVERED;
                $this->info('Start changing status of order #' . $order_id . ' from "delivering" to "delivered"');
                break;
            default:
                $this->warn('Start changing status of order #' . $order_id . ' cannot be changed');
                return;
        }

        if ($new_status) {
            $order_updated = $orderRepository->update($order_id, [
                'status' => $new_status
            ]);

            $this->info('Status of order #' . $order_id . ' changed successfully');

            OrderChangedStatus::dispatch($order_id);
        }
    }
}
