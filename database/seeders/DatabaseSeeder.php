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

    /**
     * Seed the application's database.
     */
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

        Product::factory(1000)->create();
    }
}