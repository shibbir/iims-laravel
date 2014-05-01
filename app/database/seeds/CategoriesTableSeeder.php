<?php

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        $category = [
            'title' => 'Miscellaneous',
            'description' => 'This is the default category'
        ];

        DB::table('categories')->insert($category);
    }
}