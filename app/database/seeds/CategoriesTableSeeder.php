<?php

use IIMS\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        $category = [
            'title' => 'Miscellaneous',
            'description' => 'This is the default category'
        ];

        Category::create($category);

        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            Category::create([
                'title' => $faker->unique()->word,
                'description' => $faker->sentence()
            ]);
        }
    }
}