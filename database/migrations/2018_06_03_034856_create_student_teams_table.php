<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_teams', function(Blueprint $table)
		{
			$table->integer('team_id')->nullable()->index('team_id');
			$table->timestamps();
			$table->integer('degree_id')->nullable()->index('student_team_degrees_id_fk');
			$table->integer('student_id')->nullable()->index('student_team_students_id_fk');
			$table->integer('id', true);
			$table->integer('qtd')->nullable();
			$table->integer('serie')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('student_teams');
	}

}
