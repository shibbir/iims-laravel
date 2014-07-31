<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration {

	public function up()
	{
		Schema::create('sales', function(Blueprint $table)
		{
			$table->increments('id');
            $table->decimal('service_charge')->default(0);
            $table->decimal('discount')->default(0);
            $table->decimal('vat')->default(0);
            $table->decimal('total_amount')->default(0);
            $table->decimal('net_payable_amount')->default(0);
            $table->integer('customer_id');
            $table->integer('created_by');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sales');
	}
}