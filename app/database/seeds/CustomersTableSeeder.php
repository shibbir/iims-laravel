<?php

use IIMS\Models\Customer;
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 50) as $index)
        {
            Customer::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'contact' => $faker->phoneNumber,
                'address' => $faker->address
            ]);
        }
    }
}