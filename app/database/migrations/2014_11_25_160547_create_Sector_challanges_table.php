<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorChallangesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sector_challanges', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('Sector_id');
            $table->integer('report_id');
            $table->integer('NGO_id');
            $table->string('challanges');
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
        Schema::drop('Sector_challanges');
    }

}
