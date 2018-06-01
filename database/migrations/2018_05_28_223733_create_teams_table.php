<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teams', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('year')->nullable();
			$table->string('name', 191)->nullable();
			$table->timestamps();
			$table->integer('qtd_students')->nullable();
			$table->string('shift', 20)->nullable();
			$table->integer('serie')->nullable();
			$table->integer('teacher_id')->nullable()->index('teams_teacher___fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teams');
	}

}
