<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_status_id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('point_id');
            $table->unsignedInteger('car_id');
            $table->unsignedInteger('rate_id');
            $table->string('color');
            $table->unsignedBigInteger('date_from');
            $table->unsignedBigInteger('date_to');
            $table->decimal('price');
            $table->boolean('is_full_tank');
            $table->boolean('is_need_child_chair');
            $table->boolean('is_right_wheel');
            $table->timestamps();

            $table->foreign('rate_id')->references('id')->on('rates');
            $table->foreign('order_status_id')->references('id')->on('order_statuses');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('point_id')->references('id')->on('points');
            $table->foreign('car_id')->references('id')->on('car_models');
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
}
