<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnualReportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('annual_report', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('NGO_id');
			$table->string('report_date');
			$table->string('annual_meeting_date');
			$table->string('username');
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
		Schema::drop('annual_report');
	}

}
