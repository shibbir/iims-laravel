<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesInvoiceDetailsTable extends Migration {

	public function up()
	{
		Schema::create('sales_invoice_details', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('invoice_id');
            $table->integer('product_id');
            $table->string('serial');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sales_invoice_details');
	}
}