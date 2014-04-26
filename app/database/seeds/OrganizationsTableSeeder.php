<?php

class OrganizationsTableSeeder extends Seeder {

    public function run()
    {
        $organization = [
            'title'       => 'Computer Zone',
            'subTitle'    => 'Computer sales & services',
            'address'     => 'Dhaka, Bangladesh',
            'description' => 'Accessories, Computer Software, Game, Cybercafe, Design & Training',
            'mobile'      => '01710598961',
            'phone'       => '55967',
            'email'       => 'support@iims.com',
            'website'     => 'http://iims.shibbir.net/'
        ];

        DB::table('organizations')->insert($organization);
    }
}