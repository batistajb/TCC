<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('color');
            $table->date('birth');
            $table->string('nationality');
            $table->string('naturalness');
            $table->string('sex');
            $table->string('uf');            $table->string('transport');
            $table->string('certificate_number');
            $table->string('certificate_registry');
            $table->string('certificate_leaf');
	        $table->string('certificate_expedition');
            $table->string('certificate_leaf');

	        $table->integer('team_id')->unsigned();
	        $table->foreign('team_id')->references('id')->on('teams')->OnDelete('cascade');
	        $table->integer('membership_id')->unsigned();
	        $table->foreign('membership_id')->references('id')->on('memberships')->OnDelete('cascade');
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
        Schema::dropIfExists('students');
    }
}
