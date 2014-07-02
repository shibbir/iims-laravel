<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->string('title')->unique();
            $table->string('description');
            $table->integer('quantity');
            $table->string('warranty');
            $table->decimal('buying_price');
            $table->decimal('retail_price');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}