<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration {

	public function up()
	{
		Schema::create('sales', function(Blueprint $table)
		{
			$table->increments('id');
            $table->decimal('service_charge');
            $table->decimal('discount');
            $table->decimal('vat');
            $table->decimal('total_amount');
            $table->decimal('net_payable_amount');
            $table->integer('customer_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sales');
	}
}