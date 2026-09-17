<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $categories = [
            [
                'name' => 'Porteros',
                'description' => 'Jugadores encargados de proteger la portería y evitar los goles del equipo rival.'
            ],
            [
                'name' => 'Defensas',
                'description' => 'Jugadores encargados principalmente de proteger la zona defensiva y recuperar el balón.'
            ],
            [
                'name' => 'Mediocampistas',
                'description' => 'Jugadores que conectan la defensa con el ataque y participan en la creación del juego.'
            ],
            [
                'name' => 'Delanteros',
                'description' => 'Jugadores principalmente orientados al ataque y a la creación y finalización de oportunidades de gol.'
            ],
        ];

        return fake()->randomElement($categories);
    }
}