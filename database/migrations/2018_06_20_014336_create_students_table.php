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
			$table->integer('id', true);
			$table->string('name', 191)->nullable();
			$table->string('color', 191)->nullable();
			$table->date('birth')->nullable();
			$table->string('nationality', 191)->nullable();
			$table->string('naturalness', 191)->nullable();
			$table->boolean('sex')->nullable();
			$table->string('uf', 191)->nullable();
			$table->string('certificate_number', 191)->nullable();
			$table->string('certificate_register', 191)->nullable();
			$table->string('certificate_leaf', 191)->nullable();
			$table->date('certificate_expedition')->nullable();
			$table->string('name_mother', 191)->nullable();
			$table->string('name_father', 191)->nullable();
			$table->timestamps();
			$table->string('nis', 191)->nullable();
			$table->integer('serie')->nullable();
			$table->integer('responsible_id')->nullable()->index('students_responsibles_id_fk');
			$table->integer('enroll')->nullable()->default(6);
			$table->string('degree_id', 6)->nullable();
			$table->integer('status')->nullable()->default(0);
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
