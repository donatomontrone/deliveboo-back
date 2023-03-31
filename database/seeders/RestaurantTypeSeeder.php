<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use function PHPSTORM_META\type;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurants = Restaurant::all();
        $types = Type::all()->pluck('id');

        // foreach ($restaurants as $restaurant) {
        //     $restaurant->types()->attach($faker->randomElements($types, 2));
        //     $restaurant::where('');
        // }

        $restaurants[0]->types()->attach([$types[1] , $types[4]]);
        $restaurants[1]->types()->attach([$types[4],$types[5], $types[6]]);
        $restaurants[2]->types()->attach([$types[1] , $types[5] , $types[0]]);
        $restaurants[3]->types()->attach([$types[0] , $types[1]]);
        $restaurants[4]->types()->attach([$types[0] , $types[1]]);
        $restaurants[5]->types()->attach([$types[0] , $types[2] , $types[3] , $types[5]]);
        $restaurants[6]->types()->attach([$types[0] , $types[1] , $types[3]]);
        $restaurants[7]->types()->attach([$types[4] , $types[7]]);
        $restaurants[8]->types()->attach([$types[0] , $types[1] , $types[4]]);
        $restaurants[9]->types()->attach([$types[0] , $types[1] , $types[7]]);
        $restaurants[11]->types()->attach([$types[0] , $types[2] , $types[3] , $types[5]]);
    }
}