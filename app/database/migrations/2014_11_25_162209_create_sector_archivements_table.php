<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorArchivementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('sector_archivements', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('Sector_id');
            $table->integer('NGO_id');
            $table->integer('report_id');
            $table->string('archivements');
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
        Schema::drop('sector_archivements');
	}

}
