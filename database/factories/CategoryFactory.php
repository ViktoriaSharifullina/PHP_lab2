<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(2),
            'code' => $this->faker->unique()->slug,
            'active' => $this->faker->boolean(75),
            'created_at' => $this->faker->date(),
            'parent_category_id' => Category::all()->count() ? Category::all()->random()->id : null
        ];
    }
}
