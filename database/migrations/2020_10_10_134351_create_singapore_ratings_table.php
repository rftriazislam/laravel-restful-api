<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingaporeRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singapore_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country_code');
            $table->integer('user_id');
            $table->integer('services_id');
            $table->string('rating_point');
            $table->string('review');
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
        Schema::dropIfExists('singapore_ratings');
    }
}
