<?php

namespace App\Console\Commands;

use Faker\Factory;
use App\Events\OrderChangedStatus;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Console\Command;

class CreateOrders extends Command
{
    protected $signature = 'orders:create {count=5}';

    protected $description = 'Create a specified number of new orders';

    public function handle(
        OrderRepositoryInterface $orderRepository
    )
    {
        $faker = Factory::create();

        $orders_count = (int)$this->argument('count');

        for ($i = 0; $i < $orders_count; $i++) {
            $order = $orderRepository->store([
                'total' => $faker->randomFloat(2, 10, 1000),
                'customer_name' => $faker->firstName(),
                'customer_surname' => $faker->lastName(),
                'status' => 'new'
            ]);

            $this->info('Order ' . $order->id . ' created successfully');

            broadcast(new OrderChangedStatus($order->id));
        }
    }
}
