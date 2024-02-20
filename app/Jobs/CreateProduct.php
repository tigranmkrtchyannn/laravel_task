<?php

namespace App\Jobs;

use App\DTO\ProductDto;
use App\Models\Product;
use App\Repository\Write\Product\ProductWriteRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct( public ProductDto $productDto)
    {
        $this->onQueue('product');
    }

    /**
     * Execute the job.
     */
    public function handle(ProductWriteRepositoryInterface $productWriteRepository): void
    {
        $data = Product::create($this->productDto);
        $productWriteRepository->save($data);
    }
}
