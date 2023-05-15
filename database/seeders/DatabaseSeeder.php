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
        // Создаем 100 категорий
        $categoryCount = 100;
        $childCount = 10;
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
                ->count(3)
                ->create([
                    'category_id' => $category->id,
                ]);
        }
    }
}
