<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndTravellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ind_travellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country_code')->nullable();
            $table->integer('user_id');
            $table->string('mobile_verification')->nullable();
            $table->string('email_verification')->nullable();
            $table->string('NID_verification')->nullable();
            $table->string('NID_number')->nullable();
            $table->string('NID_image')->nullable();
            $table->string('self_video')->nullable();
            $table->integer('security_money')->nullable();
            $table->string('resident_verification')->nullable();
            $table->string('agent_verification')->nullable();
            $table->boolean('sucessfull_delivery_count')->default(0);
            $table->boolean('unsucessfull_delivery')->default(0);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('ind_travellers');
    }
}
