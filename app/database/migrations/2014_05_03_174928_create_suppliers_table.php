<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration {

	public function up()
	{
		Schema::create('suppliers', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('company_name')->unique();
            $table->string('phone')->unique();
            $table->string('mobile')->unique();
            $table->string('email')->unique();
            $table->string('website')->unique();
            $table->string('fax');
            $table->string('address');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('suppliers');
	}
}