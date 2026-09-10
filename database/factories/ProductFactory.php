<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $seed = fake()->unique()->numberBetween(1, 100);

        return [
            'name' => fake()->name(),
            'description' => fake()->sentence(10),
            'price' => fake()->randomFloat(2, 100000, 5000000),
            'category_id' => Category::inRandomOrder()->value('id'),

            // Foto diferente para cada jugador
            'image' => "https://api.dicebear.com/9.x/personas/svg?seed=player{$seed}",
        ];
    }
}