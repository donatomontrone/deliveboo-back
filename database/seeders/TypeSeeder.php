<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = config('db.types');

        foreach ($types as $type) {
            $newType = new Type();
            $newType->title =  $type['title'];
            $newType->img_path =  $type['img_path'];
            $newType->color =  $type['color'];
            $newType->save();
        }
    }
}