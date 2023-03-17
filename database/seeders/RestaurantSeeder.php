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

        $restaurants = [
            [
                'name' => 'La Pergola',
                'address' => 'Via Alberto Cadlolo 101',
                'image' => 'https://www.projectinvictus.it/wp-content/uploads/2022/08/junk-food-scaled.jpg',
            ],
            [
                'name' => 'La Lucia',
                'address' => 'Piazza Mazzini 21',
                'image' => 'https://www.yegam.it/wp-content/uploads/2019/05/yegam-blog-slow-food.jpg',
            ],
            [
                'name' => 'Osteria Salentina',
                'address' => 'Via del Mare 72',
                'image' => 'https://ichef.bbci.co.uk//food/ic/food_16x9_832/recipes/crispy_smashed_potatoes_70636_16x9.jpg',
            ],
            [
                'name' => 'Il Vecchio Molo',
                'address' => 'Via Liguria 19',
                'image' => 'https://tb-static.uber.com/prod/image-proc/processed_images/91e744b222ecac52cfaf1f15cd79eadc/69ad85cd7b39888042b3bbf1c22d630d.webp',
            ],
            [
                'name' => 'Il Ristorante di Donato',
                'address' => 'Via della Madonnina 6',
                'image' => 'https://www.fabriziocostantini.it/images/food-digital.jpg',
            ],
            [
                'name' => 'La Trattoria da Gino Ginetti',
                'address' => 'Via Santa Monica di Stefanino 47',
                'image' => 'https://www.torinotoday.it/~media/horizontal-hi/50984033489356/cibo_osteria_pexels-2.jpg',
            ],
            [
                'name' => 'La Taverna di Paolo detto Domenico',
                'address' => 'Via San Rocco 29',
                'image' => 'https://media.suara.com/pictures/653x366/2021/08/02/81387-ilustrasi-makanan-cepat-saji-freepik.jpg',
            ],
            [
                'name' => 'La Pizzeria di Aniello',
                'address' => 'Via Roma 18',
                'image' => 'https://media-cdn.tripadvisor.com/media/photo-s/1b/59/24/ba/pizza.jpg',
            ],
            [
                'name' => 'Il Sushi che vorresti',
                'address' => 'Via Tokyo 9',
                'image' => 'https://media.gqitalia.it/photos/60105cb52ff22977eb9ae86e/16:9/w_1280,c_limit/Ritorno%20dei%20Climatariani_Pinterest%20(sustainablefood).jpg',
            ],
            [
                'name' => 'Sapori di Trani',
                'address' => 'Via Appia Nuova 3',
                'image' => 'http://static1.squarespace.com/static/53b839afe4b07ea978436183/53bbeeb2e4b095b6a428a13e/5fd2570b51740e23cce97919/1676678395594/traditional-food-around-the-world-Travlinmad.jpg?format=1500w',
            ],
        ];
        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->slug = Str::slug($newRestaurant->name);
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->VAT = $faker->unique->numerify('###########');
            $newRestaurant->img_path = $restaurant['image'];
            $newRestaurant->save();
        }
    }
}
