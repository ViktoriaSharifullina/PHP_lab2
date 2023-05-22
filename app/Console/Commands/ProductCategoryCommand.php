<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class ProductCategoryCommand extends Command
{

    protected $signature = 'product:category {id}';
    protected $description = 'Command description';

    public function handle(): void
    {
        $productId = $this->argument('id');

        $product = Product::find($productId);

        if (!$product) {
            throw new \InvalidArgumentException("Product with ID {$productId} does not exist.");
        }

        $categoryCode = $product->category->code;

        $this->info("Category code for product ID {$productId}: {$categoryCode}");
    }
}
