<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNGOsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('NGOs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('registation_date');
			$table->string('postal_adress');
			$table->string('region');
			$table->string('district');
			$table->string('phone_number');
			$table->string('email');
			$table->string('priority_sector');
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
		Schema::drop('NGOs');
	}

}
