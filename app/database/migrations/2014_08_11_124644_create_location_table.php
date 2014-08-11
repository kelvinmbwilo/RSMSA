<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rsmsa_location', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('level');
			$table->string('latitude');
			$table->string('longitude');
			$table->integer('parentId');
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
		Schema::drop('rsmsa_location');
	}

}
