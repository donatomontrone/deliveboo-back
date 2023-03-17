<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Restaurant;
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
        $dishes = [
            [
                'name' => 'Spaghetto allo scoglio',
                'description' => 'Piatto cucinato dallo chef Stellato Donato Montrone',
                'ingredients' => 'Pasta, Pesce fresco, Olio, Aglio',
                'price' => 23.99
            ],
            [
                'name' => 'Pizza Nestola',
                'description' => 'Pizza con lievito madre, impastata personalmente da Riccardo Nestola',
                'ingredients' => 'Farina, Lievito, Olio, Acqua, Pomodoro, Mozzarella, Würstel, Patatine',
                'price' => 11.99
            ],
            [
                'name' => 'Carne all\'Aniello',
                'description' => 'Carne di Bovino, ammazzato personalmente dallo chef Aniello Piscopo',
                'ingredients' => 'Carne, Origano, Olio, Sale',
                'price' => 44.85
            ],
            [
                'name' => 'CheesCake di Mimmo',
                'description' => 'Dolce prelibato preparato con prodotti a KM0 dello Chef Mimmo',
                'ingredients' => 'Biscotti, Panna, Limone, Philadelphia',
                'price' => 8.99
            ],
            [
                'name' => 'Spezzatino di Montrone',
                'description' => 'Carne di Montone, ammazzato personalmente dallo chef Donato',
                'ingredients' => 'Carne, Origano, Olio, Sale',
                'price' => 187.65
            ],
            [
                'name' => 'Salumi da Donato',
                'description' => 'Salumi di alta qualità scelti personalmente dal salumiere Donato',
                'ingredients' => 'Salumi vari',
                'price' => 18.99
            ],
        ];

        foreach ($dishes as $dish) {
            $newDish = new Dish();
            $newDish->restaurant_id = Restaurant::inRandomOrder()->first()->id;
            $newDish->category_id = Category::inRandomOrder()->first()->id;
            $newDish->name = $dish['name'];
            $newDish->slug = Str::slug($newDish->name);
            $newDish->description = $dish['description'];
            $newDish->ingredients = $dish['ingredients'];
            $newDish->price = $dish['price'];
            $newDish->is_visible = $faker->boolean(90);
            $newDish->save();
        }
    }
}
