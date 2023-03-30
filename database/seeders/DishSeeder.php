<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $dishes = config('db.dishes');

        foreach ($dishes as $dish) {
            $newDish = new Dish();
            $newDish->restaurant_id = $dish['restaurant_id'];
            $newDish->category_id = $dish['category_id'];
            $newDish->name = $dish['name'];
            $newDish->img_path = $dish['img_path'];
            $newDish->slug = Str::slug($newDish->name);
            $newDish->description = $dish['description'];
            $newDish->ingredients = $dish['ingredients'];
            $newDish->price = $dish['price'];
            $newDish->is_visible = $faker->boolean(90);
            $newDish->save();
        }
    }
}