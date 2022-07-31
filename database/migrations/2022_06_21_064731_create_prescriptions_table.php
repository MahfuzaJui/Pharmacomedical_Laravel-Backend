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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('prescriptionID');
            $table->integer('userID')->unsigned();
            $table->integer('doctorID')->unsigned();
            $table->integer('pharmaceuticalItemID')->unsigned();
            $table->string('advice');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('userID')->references('userID')->on('users');
            $table->foreign('doctorID')->references('doctorID')->on('doctors');
            $table->foreign('pharmaceuticalItemID')->references('pharmaceuticalItemID')->on('pharmaceutical_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
};
