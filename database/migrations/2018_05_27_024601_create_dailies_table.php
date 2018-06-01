<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDailiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dailies', function(Blueprint $table)
		{
			$table->integer('dalies_id');
			$table->integer('subject_id')->index('subject_id');
			$table->integer('student_id')->index('student_id');
			$table->integer('frequency')->nullable();
			$table->integer('note')->nullable();
			$table->string('serie', 4)->nullable();
			$table->primary(['dalies_id','subject_id','student_id']);
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
		Schema::drop('dailies');
	}

}
