<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorPracticesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('sector_practices', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('Sector_id');
            $table->integer('NGO_id');
            $table->integer('report_id');
            $table->string('practices');
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
		//
	}

}
