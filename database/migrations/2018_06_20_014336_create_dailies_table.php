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
			$table->integer('id', true);
			$table->integer('subject_id')->nullable()->index('subject_id');
			$table->integer('student_id')->nullable()->index('student_id');
			$table->integer('frequency')->nullable()->default(0);
			$table->integer('note')->nullable()->default(0);
			$table->integer('year')->nullable();
			$table->timestamps();
			$table->integer('status')->nullable()->default(0);
			$table->integer('degree_id')->nullable()->index('dailies_degrees_id_fk');
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
