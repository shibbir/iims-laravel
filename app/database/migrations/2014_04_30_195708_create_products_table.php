<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('category_id');
            $table->string('title')->unique();
            $table->string('description');
            $table->integer('quantity');
            $table->string('warranty');
            $table->decimal('unit_price');
            $table->boolean('is_available');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}