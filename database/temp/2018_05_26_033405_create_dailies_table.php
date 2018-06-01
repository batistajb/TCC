<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('frequency');
            $table->string('note');

	        $table->integer('student_id')->unsigned();
	        $table->foreign('student_id')->references('id')->on('students')->OnDelete('cascade');
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
        Schema::dropIfExists('dailies');
    }
}
