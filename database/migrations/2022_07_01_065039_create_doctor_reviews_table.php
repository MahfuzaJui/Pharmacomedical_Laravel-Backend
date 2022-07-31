<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_reviews', function (Blueprint $table) {
            $table->increments('doctorReviewID');
            $table->integer('userID')->unsigned();
            $table->integer('doctorID')->unsigned();
            $table->string('point');
            $table->string('description');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('userID')->references('userID')->on('users');
            $table->foreign('doctorID')->references('doctorID')->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_reviews');
    }
};
