<?php

use IIMS\Models\Product;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 50) as $index)
        {
            Product::create([
                'category_id' => $faker->randomNumber(1, 10),
                'title' => $faker->unique()->name,
                'description' => $faker->sentence(),
                'quantity' => $faker->randomDigitNotNull,
                'warranty' => $faker->word,
                'unit_price' => $faker->randomDigitNotNull,
                'is_available' => $faker->boolean()
            ]);
        }
    }
}