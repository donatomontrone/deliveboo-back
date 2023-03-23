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
        $categories = config('db.categories');

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->title = $category['title'];
            $newCategory->img_path = $category['img_path'];
            $newCategory->save();
        }
    }
}