<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

	        $table->integer('historic_degree_id')->unsigned();
	        $table->foreign('historic_degree_id')->references('id')->on('historic_degrees')->OnDelete('cascade');

	        $table->integer('daily_id')->unsigned();
	        $table->foreign('daily_id')->references('id')->on('dailies')->OnDelete('cascade');
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
        Schema::dropIfExists('degrees');
    }
}
