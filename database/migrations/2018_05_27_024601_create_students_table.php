<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('name', 191)->nullable();
			$table->string('color', 191)->nullable();
			$table->date('birth')->nullable();
			$table->string('nationality', 191)->nullable();
			$table->string('naturalness', 191)->nullable();
			$table->boolean('sex')->nullable();
			$table->string('uf', 191)->nullable();
			$table->integer('certificate_number')->nullable();
			$table->string('certificate_registry', 191)->nullable();
			$table->string('certificate_leaf', 191)->nullable();
			$table->date('certificate_expedicion')->nullable();
			$table->string('name_mother', 191)->nullable();
			$table->string('name_father', 191)->nullable();
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
		Schema::drop('students');
	}

}
