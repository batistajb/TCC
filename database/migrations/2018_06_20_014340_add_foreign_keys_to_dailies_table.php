<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDailiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dailies', function(Blueprint $table)
		{
			$table->foreign('degree_id', 'dailies_degrees_id_fk')->references('id')->on('degrees')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('subject_id', 'dailies_subject___fk')->references('id')->on('subjects')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dailies', function(Blueprint $table)
		{
			$table->dropForeign('dailies_degrees_id_fk');
			$table->dropForeign('dailies_subject___fk');
		});
	}

}
