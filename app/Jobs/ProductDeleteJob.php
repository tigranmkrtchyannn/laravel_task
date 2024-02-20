<?php

namespace App\Jobs;

use App\Repository\Write\Product\ProductWriteRepositoryInterface;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProductDeleteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public $tries = 2;

    private float $maxPrice;


    public function __construct(
        float $maxPrice
    )
    {
        $this->maxPrice = $maxPrice;
        $this->onQueue('product');
    }

    /**
     * Execute the job.
     */
    public function handle(ProductWriteRepositoryInterface $productWriteRepository): void
    {
        $productWriteRepository->deleteBasedOnPrice($this->maxPrice);

    }

    public function failed(Exception $exception): void
    {
        Log::error('Product deleted is failed');
    }
}
