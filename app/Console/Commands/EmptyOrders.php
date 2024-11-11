<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class EmptyOrders extends Command
{
    protected $signature = 'orders:delete';

    protected $description = 'Delete all orders form DB';

    public function handle(): void
    {
        Order::query()->delete();

        $this->info('Orders deleted successfully');
    }
}
