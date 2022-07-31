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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('orderID');
            $table->integer('userID')->unsigned();
            $table->integer('pharmaceuticalItemID')->unsigned();
            $table->double('totalAmount');
            $table->string('hasPaid');
            $table->datetime('paidDate&Time');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('userID')->references('userID')->on('users');
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
        Schema::dropIfExists('orders');
    }
};
