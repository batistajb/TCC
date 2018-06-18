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
			$table->string('tel', 191)->nullable();
			$table->string('street', 191)->nullable();
			$table->string('state', 191)->nullable();
			$table->string('city', 191)->nullable();
			$table->integer('number')->nullable();
			$table->string('district', 191)->nullable();
			$table->string('name_responsible', 290)->nullable();
			$table->string('kinship', 191)->nullable();
			$table->timestamps();
			$table->integer('divulgation')->nullable()->default(0);
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
		Schema::drop('responsibles');
	}

}
