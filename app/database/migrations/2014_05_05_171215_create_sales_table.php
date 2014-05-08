<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration {

	public function up()
	{
		Schema::create('sales', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('invoice_id')->unique();
            $table->integer('customer_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sales');
	}
}