<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->bigInteger('priceMin');
            $table->bigInteger('priceMax');
            $table->string('number');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('thumbnail_id');
            $table->bigInteger('tank');
            $table->string('colors');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('category_ids');
            $table->foreign('thumbnail_id')->references('id')->on('thumbnails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_models');
    }
}
