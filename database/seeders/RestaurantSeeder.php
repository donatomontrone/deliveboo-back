<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use StringBackedEnum;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        $restaurants = config('db.restaurants');
        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->user_id = User::inRandomOrder()->first()->id;
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->slug = Str::slug($newRestaurant->name);
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->VAT = $faker->unique->numerify('###########');
            $newRestaurant->img_path = $restaurant['image'];
            $newRestaurant->save();
        }
    }
}