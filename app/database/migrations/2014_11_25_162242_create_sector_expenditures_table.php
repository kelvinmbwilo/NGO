<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorExpendituresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('sector_expenditures', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('Sector_id');
            $table->integer('NGO_id');
            $table->integer('report_id');
            $table->string('direct_cost');
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
		//
	}

}
