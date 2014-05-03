<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
        $this->call('OrganizationsTableSeeder');
        $this->call('CustomersTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('SuppliersTableSeeder');
        $this->call('ProductsTableSeeder');
	}
}