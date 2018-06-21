<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDegreeSubjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('degree_subject', function(Blueprint $table)
		{
			$table->foreign('degree_id', 'degree_subject_degrees_id_fk')->references('id')->on('degrees')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('subject_id', 'degree_subject_subjects_id_fk')->references('id')->on('subjects')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('degree_subject', function(Blueprint $table)
		{
			$table->dropForeign('degree_subject_degrees_id_fk');
			$table->dropForeign('degree_subject_subjects_id_fk');
		});
	}

}
