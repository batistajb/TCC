<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDegreeSubjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('degree_subject', function(Blueprint $table)
		{
			$table->integer('degree_id')->index('degree_subject_degrees_id_fk');
			$table->integer('subject_id');
			$table->index(['subject_id','degree_id'], 'degree_subject_id__fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('degree_subject');
	}

}
