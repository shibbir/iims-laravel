<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMetadataTable extends Migration {

	public function up()
	{
		Schema::create('product_metadata', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('product_id');
            $table->string('serial')->unique();
            $table->boolean('isAvailable');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('product_metadata');
	}
}