<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenditureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenditure', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('NGO_id');
			$table->integer('report_id');
			$table->string('direct_cost');
			$table->string('adminstrative_cost');
			$table->string('total');
			$table->string('balance');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('expenditure');
	}

}
