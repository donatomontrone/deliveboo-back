<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RestaurantSeeder::class,
            TypeSeeder::class,
            RestaurantTypeSeeder::class,
            CategorySeeder::class,
            DishSeeder::class,
            OrderSeeder::class,
            DishOrderSeeder::class
        ]);
    }
}
