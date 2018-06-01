<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricDailiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historic_dailies', function (Blueprint $table) {

	        $table->integer('daily_id')->unsigned();
	        $table->foreign('daily_id')->references('id')->on('dailies')->OnDelete('cascade');

	        $table->integer('historic_id')->unsigned();
	        $table->foreign('historic_id')->references('id')->on('historics')->OnDelete('cascade');

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
        Schema::dropIfExists('historic_dailies');
    }
}
