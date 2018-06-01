<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_subjects', function (Blueprint $table) {
	        $table->integer('degree_id')->unsigned();
	        $table->foreign('degree_id')->references('id')->on('degrees')->OnDelete('cascade');
	        $table->integer('subject_id')->unsigned();
	        $table->foreign('subject_id')->references('id')->on('subjects')->OnDelete('cascade');
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
        Schema::dropIfExists('degree_subjects');
    }
}
