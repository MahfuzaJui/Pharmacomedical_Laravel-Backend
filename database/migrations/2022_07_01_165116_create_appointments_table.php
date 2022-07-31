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
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('appID');
            $table->integer('userID')->unsigned();
            $table->integer('doctorID')->unsigned();
            $table->datetime('appointmentDate&Time');
            $table->string('purpose');
            $table->string('visited');
            $table->string('hasPaid');
            $table->datetime('paidDate&Time');
            $table->string('appointmentStatus');
            $table->string('link');
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
        Schema::dropIfExists('appointments');
    }
};
