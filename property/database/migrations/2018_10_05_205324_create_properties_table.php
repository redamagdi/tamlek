<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cost');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types')->onDeletes('cascade');
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions')->onDeletes('cascade');
            $table->string('reference')->nullable();
            $table->string('room')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('map');
            $table->string('area');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDeletes('cascade');
            $table->string('recommend')->default(0);
            $table->string('type')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('properties');
    }
}
