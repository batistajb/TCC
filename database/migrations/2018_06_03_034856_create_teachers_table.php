<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers', function(Blueprint $table)
		{
			$table->string('name', 191)->nullable();
			$table->integer('id', true);
			$table->string('cpf', 191)->nullable();
			$table->timestamps();
			$table->string('tel', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teachers');
	}

}
