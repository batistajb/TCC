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
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('name');//nome do aluno
	        $table->string('sex');//sexo
	        $table->string('race');//raça da criança
	        $table->string('naturalness');//naturalidade
	        $table->string('nationality');//nacionalidade
	        $table->string('name_certificate');//nome do cartório
	        $table->string('number_certificate');//número da certidão de nascimento
	        $table->string('number_leaf');//número da folha e pagina da certidão de nascimento
	        $table->string('date_expedition_c');//data de expedição da certidão
	        $table->string('state');//estado de nascimento
	        $table->string('date_birth');//data de nascimento
	        $table->string('number_id');//numero da identidade
	        $table->string('organ_id');//orgáo expedidor
	        $table->string('cpf');//cpf
	        $table->string('father');//nome do pai
	        $table->string('cpf_father');//cpf do pai
	        $table->string('id_father');//identidade do pai
	        $table->string('mother');//nome da mãe
	        $table->string('cpf_mother');//cpf da mãe
	        $table->string('id_mother');//identidade da mãe
	        $table->string('deficiency');//portadora de deficiencia?qual?
	        $table->string('locomotion');//transporte ate a escola
	        $table->string('distance');//distancia da escola ate a casa
	        $table->string('restriction');//se possui alguma restrição

	        $table->integer('id_responsible_students');//se possui alguma restrição
	        $table->foreign('id_responsible_students')
		        ->references('id')->on('responsible_students')
		        ->onDelete('cascade');;

	        $table->integer('id_address');//endereco
	        $table->foreign('id_address')
		        ->references('id')->on('address')
		        ->onDelete('cascade');;
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
