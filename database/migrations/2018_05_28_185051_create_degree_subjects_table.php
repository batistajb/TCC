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
            $table->integer('degree_id');
	        $table->foreign('degree_id')->references('id')->on('degree')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('subject_id');
	        $table->foreign('subject_id')->references('id')->on('subjects')->onUpdate('CASCADE')->onDelete('CASCADE');

	        $table->primary(['degree_id','subject_id']);

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
