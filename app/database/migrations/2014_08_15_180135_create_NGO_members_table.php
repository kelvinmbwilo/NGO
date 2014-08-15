<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNGOMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('NGO_members', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('NGO_id');
			$table->string('name');
			$table->string('position');
			$table->string('sex');
			$table->string('age');
			$table->string('nationality');
			$table->string('year_of_admission');
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
		Schema::drop('NGO_members');
	}

}
