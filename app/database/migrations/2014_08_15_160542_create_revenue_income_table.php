<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevenueIncomeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('revenue_income', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('NGO_id');
			$table->integer('report_id');
			$table->string('amount_from_last_year');
			$table->string('tax_relief');
			$table->string('government_subsidies');
			$table->string('members_fee');
			$table->string('economic_investment');
			$table->string('user_fees');
			$table->string('public_support');
			$table->string('local_granting');
			$table->string('private_sector_support');
			$table->string('grand_from_foreign');
			$table->string('other_sources');
			$table->string('total');
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
		Schema::drop('revenue_income');
	}

}
