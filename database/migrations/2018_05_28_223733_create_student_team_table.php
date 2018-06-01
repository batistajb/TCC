<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentTeamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_team', function(Blueprint $table)
		{
			$table->integer('student_id');
			$table->integer('team_id')->index('team_id');
			$table->timestamps();
			$table->primary(['student_id','team_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('student_team');
	}

}
