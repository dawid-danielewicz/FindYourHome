<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDimensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dimensions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('area');
            $table->integer('garage_area');
            $table->integer('garden_area');
            $table->integer('balcony_area');
            $table->integer('terrace_area');
            $table->bigInteger('advert_id')->unsigned();
            $table->foreign('advert_id')->references('id')->on('adverts')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dimensions');
    }
}
