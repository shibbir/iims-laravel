<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesInvoiceProductDetailsTable extends Migration {

	public function up()
	{
		Schema::create('sales_invoice_product_details', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('invoice_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->decimal('selling_price')->default(0);
            $table->string('warranty');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sales_invoice_product_details');
    }
}