<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration {

	public function up()
	{
		Schema::create('purchases', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('invoice_id')->unique();
            $table->integer('supplier_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('purchases');
	}
}