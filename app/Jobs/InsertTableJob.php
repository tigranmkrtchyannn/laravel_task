<?php

namespace App\Jobs;


use App\Repository\Shop\read\ShopCategoryReadRepositoryInterface;
use App\Repository\Shop\read\ShopProductReadRepositoryInterface;
use App\Repository\Shop\write\ShopCategoryWriteRepositoryInterface;
use App\Repository\Shop\write\ShopProductRatingWriteRepositoryInterface;
use App\Repository\Shop\write\ShopProductWriteRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Ixudra\Curl\Facades\Curl;

class InsertTableJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private const URL = 'https://fakestoreapi.com/products/';
    private $data;



    public function __construct()
    {
        $this->onQueue('product');
    }



    public function handle(
        ShopProductRatingWriteRepositoryInterface $productRatingWriteRepository,
        ShopProductWriteRepositoryInterface  $productWriteRepository,
        ShopCategoryReadRepositoryInterface  $categoryReadRepository,
        ShopProductReadRepositoryInterface   $readRepository,
        ShopCategoryWriteRepositoryInterface $categoryWriteRepository


    ): void
    {

        $curl = Curl::to(self::URL)->get();
        $this->data = json_decode($curl);

        $this->insertCategory($categoryReadRepository,  $categoryWriteRepository);
        $this->insertProducts($categoryReadRepository,  $productWriteRepository);
        $this->insertRating($productRatingWriteRepository,$readRepository);

    }
    private function insertCategory(

        ShopCategoryReadRepositoryInterface $categoryReadRepository,
        ShopCategoryWriteRepositoryInterface $categoryWriteRepository
    ): void
    {
        $collectCategories = $categoryReadRepository->getAll();
        $categoriesData = [];

        foreach ($this->data as $product) {
            $categoryName = $product->category;
            $category = $collectCategories->where('name', $categoryName)->first();

            if (!$category) {
                $categoriesData[] = ['name' => trim($categoryName)];
            }
        }

        $categoryWriteRepository->insert($categoriesData);
    }

    private function insertProducts(
        ShopCategoryReadRepositoryInterface $categoryReadRepository,
        ShopProductWriteRepositoryInterface $productWriteRepository
    ): void
    {
        $collectCategories = $categoryReadRepository->getAll();

        $productsData = [];

        foreach ($this->data as $product) {

                $categoryName = $product->category;

                $category = $collectCategories->where('name', $categoryName)->first();

                $productsData[] = [
                    'product_id' => $product->id,
                    'title' => $product->title,
                    'description' => $product->description,
                    'price' => $product->price,
                    'category_id' => $category->id,
                    'image' => $product->image,
                ];
            }

        $productWriteRepository->insert($productsData);
    }

    private function insertRating(
        ShopProductRatingWriteRepositoryInterface $productRatingWriteRepository,
        ShopProductReadRepositoryInterface $readRepository
    ): void
    {
        $ratingsData = [];

        $collectProducts = collect($readRepository->getAll());

        foreach ($this->data as $product) {

            $productTitle = $product->title;

            $products = $collectProducts->where('title', $productTitle)->first();

             $ratingsData[] = [
                    'product_id' => $products->id,
                    'rate' => $product->rating->rate,
                    'rating_count' => (int)$product->rating->count
                ];
        }

        $productRatingWriteRepository->insert($ratingsData);
    }

}
