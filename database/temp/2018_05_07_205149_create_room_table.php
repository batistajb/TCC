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
        Schema::create('room', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');//aluno
            $table->string('shift');//turno
            $table->string('series');//serie/ano
            $table->integer('qtd_alunos');//qnt de alunos maxima
            $table->foreign('subjects_id');//disciplinas relacionadas
            $table->foreign('teacher_id');//professor relacionadas
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
        Schema::dropIfExists('room');
    }
}
