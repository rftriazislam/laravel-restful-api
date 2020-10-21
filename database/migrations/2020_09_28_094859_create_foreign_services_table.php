<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foreign_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('travel_id');
            $table->string('country_code_from');
            $table->string('country_code_from_latitude');
            $table->string('country_code_from_longitude');
            $table->string('country_code_to');
            $table->string('country_code_to_latitude');
            $table->string('country_code_to_longitude');
            $table->string('travel_start_point');
            $table->string('travel_start_point_latitude');
            $table->string('travel_start_point_longitude');
            $table->string('travel_end_point');
            $table->string('travel_end_point_latitude');
            $table->string('travel_end_point_longitude');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->time('starting_time');
            $table->time('ending_time');
            $table->string('traveling_type');
            $table->integer('foreign_services_status')->default(0);
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
        Schema::dropIfExists('foreign_services');
    }
}
