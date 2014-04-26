<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $user = [
            'username' => 'admin',
            'password' => Hash::make('1234'),
            'name'     => 'Shibbir Ahmed',
            'address'  => 'Dhaka, Bangladesh',
            'contact'  => '01710598961',
            'email'    => 'shibbir.cse@gmail.com'
        ];

        DB::table('users')->insert($user);
    }
}