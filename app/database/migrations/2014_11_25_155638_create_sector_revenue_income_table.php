<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorRevenueIncomeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('sector_revenue_income', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('Sector_id');
            $table->integer('NGO_id');
            $table->integer('report_id');
            $table->string('local_granting');
            $table->string('public_support');
            $table->string('grant_from_foreign');
            $table->string('amount_from_last_year');
            $table->string('private_sector_support');
            $table->string('ngo_subsides');
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
        Schema::drop('sector_revenue_income');
    }

}
