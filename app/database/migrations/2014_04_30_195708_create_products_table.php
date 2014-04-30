<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('categoryId');
            $table->string('title')->unique();
            $table->string('description');
            $table->string('address');
            $table->integer('quantity');
            $table->string('warranty');
            $table->decimal('unitPrice');
            $table->boolean('isAvailable');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}