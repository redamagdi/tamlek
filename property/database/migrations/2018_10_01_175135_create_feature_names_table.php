<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lang');
            $table->integer('property_id')->unsigned();
            $table->foreign('property_id')->references('id')->on('properties')->onDeletes('cascade');
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
        Schema::dropIfExists('feature_names');
    }
}
