<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::firstOrCreate(
            [
                'email' => 'test@example.com'
            ],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        // Eliminar los productos de prueba anteriores
        Product::query()->delete();

        // Eliminar las categorías anteriores
        Category::query()->delete();

        // Crear categorías reales de fútbol
        Category::create([
            'name' => 'Porteros',
            'description' => 'Jugadores encargados de proteger la portería.'
        ]);

        Category::create([
            'name' => 'Defensas',
            'description' => 'Jugadores encargados principalmente de proteger la zona defensiva.'
        ]);

        Category::create([
            'name' => 'Mediocampistas',
            'description' => 'Jugadores que conectan la defensa con el ataque y participan en la creación del juego.'
        ]);

        Category::create([
            'name' => 'Delanteros',
            'description' => 'Jugadores orientados principalmente al ataque y a la finalización de las jugadas.'
        ]);

        // Crear 100 jugadores de prueba
        Product::factory(100)->create();
    }
}