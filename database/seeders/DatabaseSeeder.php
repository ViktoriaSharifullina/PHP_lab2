<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categoryCount = 30;
        $childCount = 5;
        $categories = Category::factory()
            ->count($categoryCount)
            ->create();
        $categories->each(function ($category) use ($categories, $childCount) {
            $categories->where('id', '!=', $category->id)
                ->random($childCount)
                ->each(function ($child) use ($category) {
                    $category->children()->save($child);
                });
        });

        foreach ($categories as $category) {
            Product::factory()
                ->count(10)
                ->create([
                    'category_id' => $category->id,
                ]);
        }
    }
}
