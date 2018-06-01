<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mother_name');
            $table->string('mother_profession')->nullable();
            $table->string('mother_schooling')->nullable();
            $table->string('father_name');
            $table->string('father_profession')->nullable();
            $table->string('father_schooling')->nullable();
	        $table->string('nis', 45)->nullable()->unique('nis_UNIQUE');

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
        Schema::dropIfExists('memberships');
    }
}
