<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentParticularsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employment_particulars', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('NGO_id');
			$table->string('name');
			$table->string('gender');
			$table->string('date_of_birth');
			$table->string('nationality');
			$table->string('title');
			$table->string('employement_status');
			$table->string('year_assumed_office');
			$table->string('phone');
			$table->string('email');
			$table->string('physical_adress');
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
		Schema::drop('employment_particulars');
	}

}
