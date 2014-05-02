<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('username')->unique();
            $table->string('password', 60);
            $table->string('name');
            $table->string('contact');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('remember_token', 100)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}