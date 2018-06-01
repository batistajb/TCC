<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStudentTeamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('student_team', function(Blueprint $table)
		{
			$table->foreign('student_id', 'student_team_ibfk_2')->references('id')->on('students')->onUpdate('CASCADE')->onDelete('CASCADE');
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
		Schema::table('student_team', function(Blueprint $table)
		{
			$table->dropForeign('student_team_ibfk_2');
			$table->dropForeign('student_team_team___fk');
		});
	}

}
