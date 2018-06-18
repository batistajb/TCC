<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStudentTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('student_teams', function(Blueprint $table)
		{
			$table->foreign('degree_id', 'student_team_degrees_id_fk')->references('id')->on('degrees')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('student_id', 'student_team_students_id_fk')->references('id')->on('students')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('team_id', 'student_team_team___fk')->references('id')->on('teams')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('student_teams', function(Blueprint $table)
		{
			$table->dropForeign('student_team_degrees_id_fk');
			$table->dropForeign('student_team_students_id_fk');
			$table->dropForeign('student_team_team___fk');
		});
	}

}
