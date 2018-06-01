<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnturmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('name');//nome professor
	        $table->string('cpf');//
	        $table->string('regime');//contrato ou efetivo
	        $table->integer('address');//endereço
	        $table->foreign('address')
		        ->references('id')->on('address')
		        ->onDelete('cascade');;//endereço
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
        Schema::dropIfExists('teachers');
    }
}
