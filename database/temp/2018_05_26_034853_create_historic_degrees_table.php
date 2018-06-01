<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historic_degrees', function (Blueprint $table) {
	        $table->integer('historic_id')->unsigned();
	        $table->foreign('historic_id')->references('id')->on('historic')->OnDelete('cascade');

	        $table->integer('degree_id')->unsigned();
	        $table->foreign('degree_id')->references('id')->on('degrees')->OnDelete('cascade');
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
        Schema::dropIfExists('historic_degrees');
    }
}
