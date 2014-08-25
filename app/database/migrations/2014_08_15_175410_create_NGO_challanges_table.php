<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNGOChallangesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NGO_challanges', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('NGO_id');
            $table->integer('report_id');
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
        Schema::drop('NGO_challenges');
    }

}
