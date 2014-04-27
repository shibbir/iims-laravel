<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration {

	public function up()
	{
		Schema::create('organizations', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->string('subTitle');
            $table->string('description');
            $table->string('address');
            $table->string('mobile');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('website')->unique();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('organizations');
	}
}