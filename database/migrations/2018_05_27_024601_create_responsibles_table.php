<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResponsiblesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('responsibles', function(Blueprint $table)
		{
			$table->string('cel', 191)->nullable();
			$table->string('tel', 191)->nullable();
			$table->string('street', 191)->nullable();
			$table->string('state', 191)->nullable();
			$table->string('city', 191)->nullable();
			$table->integer('number')->nullable();
			$table->string('district', 191)->nullable();
			$table->string('name', 191)->nullable();
			$table->string('cpf', 191)->nullable();
			$table->string('kinship', 191)->nullable();
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
		Schema::drop('responsibles');
	}

}
