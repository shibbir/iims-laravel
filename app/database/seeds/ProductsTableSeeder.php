<?php

use IIMS\Models\Product;
use IIMS\Models\ProductMetadata;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 50) as $index)
        {
            $quantity = $faker->numberBetween(1, 5);

            $product = Product::create([
                'category_id'  => $faker->numberBetween(1, 10),
                'supplier_id'  => $faker->numberBetween(1, 15),
                'title'        => $faker->unique()->name,
                'description'  => $faker->sentence(),
                'quantity'     => $quantity,
                'warranty'     => $faker->word,
                'buying_price' => $faker->randomDigitNotNull,
                'retail_price' => $faker->randomDigitNotNull
            ]);

            for($index = 0; $index < $quantity; $index++)
            {
                ProductMetadata::create([
                    'product_id'  => $product->id,
                    'serial'      => $faker->unique()->ean8,
                    'is_available' => true
                ]);
            }
        }
    }
}