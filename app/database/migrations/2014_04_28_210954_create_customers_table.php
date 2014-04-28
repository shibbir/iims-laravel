<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('contact');
            $table->string('address');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('customers');
	}
}