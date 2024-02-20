<?php

namespace App\Console\Commands;

use App\Jobs\ProductDeleteJob;
use Illuminate\Console\Command;

class DeleteProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete products base on maximum  price in product table ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $maxPrice = 10000;

        ProductDeleteJob::dispatch($maxPrice);
    }
}
