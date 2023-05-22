<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $imagePath = $this->faker->image(storage_path('app/public'), 640, 480, null, false);

        return [
            'title' => $this->faker->word,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'image' => str_replace('public/', '', Storage::url($imagePath)),
            'quantity' => $this->faker->numberBetween(0, 1000),
            'created_at' => $this->faker->dateTime
        ];
    }
}
