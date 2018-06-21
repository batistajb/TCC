<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schools', function(Blueprint $table)
		{
			$table->string('tel1', 191)->nullable();
			$table->string('tel2', 191)->nullable();
			$table->string('street', 191)->nullable();
			$table->string('state', 191)->nullable();
			$table->string('city', 191)->nullable();
			$table->integer('number')->nullable();
			$table->string('district', 191)->nullable();
			$table->string('name', 290)->nullable();
			$table->string('entity', 290)->nullable();
			$table->timestamps();
			$table->integer('cnpj')->nullable();
			$table->integer('id', true);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('schools');
	}

}
