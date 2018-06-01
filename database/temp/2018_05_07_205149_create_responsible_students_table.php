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
        Schema::create('responsible_students', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('name');//nome do responsavel
	        $table->string('kinship');//parentesco
	        $table->string('number_id');//numero da identidade
	        $table->string('organ_id');//orgáo expedidor
	        $table->string('religion');//religião da familia
	        $table->integer('qtd_brothers');//qtd de irmãos da criança
	        $table->integer('qtd_peoples');//qtd de pessoas que moram mna msm casa da criança
	        $table->integer('qtd_job');//qtd de pessoas que trabalham
	        $table->integer('qtd_income');//renda da familia
	        $table->string('assistance');//programa social
	        $table->string('nis');//numero de inscrição social- bolsa familia
	        $table->string('nis');//autoriza divulgação de imagens em redes sociais
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
        Schema::dropIfExists('responsible_students');
    }
}
