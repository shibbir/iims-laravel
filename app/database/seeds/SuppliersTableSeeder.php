<?php

use IIMS\Models\Supplier;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 15) as $index)
        {
            Supplier::create([
                'company_name' => $faker->company,
                'phone'        => $faker->phoneNumber,
                'mobile'       => $faker->phoneNumber,
                'email'        => $faker->companyEmail,
                'website'      => $faker->url,
                'fax'          => $faker->postcode,
                'address'      => $faker->address
            ]);
        }
    }
}