<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Создаем 30 категорий
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

        // Для каждой категории создадим по 10 товаров
        foreach ($categories as $category) {
            Product::factory()
                ->count(10)
                ->create([
                    'category_id' => $category->id,
                ]);
        }
    }
}
