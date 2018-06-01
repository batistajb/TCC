<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDailiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dailies', function(Blueprint $table)
		{
			$table->foreign('subject_id', 'dailies_ibfk_1')->references('id')->on('subjects')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('student_id', 'dailies_ibfk_2')->references('id')->on('students')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dailies', function(Blueprint $table)
		{
			$table->dropForeign('dailies_ibfk_1');
			$table->dropForeign('dailies_ibfk_2');
		});
	}

}
