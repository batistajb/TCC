<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToListwaitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('listwait', function(Blueprint $table)
		{
			$table->foreign('student_id', 'listwait_students_id_fk')->references('id')->on('students')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('listwait', function(Blueprint $table)
		{
			$table->dropForeign('listwait_students_id_fk');
		});
	}

}
