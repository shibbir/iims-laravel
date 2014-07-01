<?php

use IIMS\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 50) as $index)
        {
            Product::create([
                'category_id'  => $faker->randomNumber(1, 10),
                'supplier_id'  => $faker->randomNumber(1, 15),
                'title'        => $faker->unique()->name,
                'sku'          => $faker->unique()->word,
                'description'  => $faker->sentence(),
                'quantity'     => $faker->randomDigitNotNull,
                'warranty'     => $faker->word,
                'buying_price' => $faker->randomDigitNotNull,
                'retail_price' => $faker->randomDigitNotNull
            ]);
        }
    }
}