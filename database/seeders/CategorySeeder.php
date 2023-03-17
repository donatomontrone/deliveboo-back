<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Antipasti',
                'img_path' => 'https://e7.pngegg.com/pngimages/657/753/png-clipart-mediterranean-cuisine-antipasto-pizza-italian-cuisine-full-breakfast-pizza-food-recipe.png'
            ],
            [
                'title' => 'Primi piatti',
                'img_path' => 'https://www.freepnglogos.com/uploads/pasta-png/pasta-seasonings-product-poddar-foods-13.png'
            ],
            [
                'title' => 'Pizza',
                'img_path' => 'https://e7.pngegg.com/pngimages/606/648/png-clipart-california-style-pizza-sicilian-pizza-chrono-pizza-fast-food-pizza-menu-food-recipe-thumbnail.png'
            ],
            [
                'title' => 'Contorni',
                'img_path' => 'https://e7.pngegg.com/pngimages/599/775/png-clipart-fries-fries.png'
            ],
            [
                'title' => 'Dolci',
                'img_path' => 'https://e1.pngegg.com/pngimages/869/133/png-clipart-sweet-cakes-s-cupcake-thumbnail.png'
            ],
            [
                'title' => 'Bevande',
                'img_path' => 'https://www.nat13.it/wp-content/uploads/2020/05/bevande-png-1.png'
            ]
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->title = $category['title'];
            $newCategory->img_path = $category['img_path'];
            $newCategory->save();
        }
    }
}
