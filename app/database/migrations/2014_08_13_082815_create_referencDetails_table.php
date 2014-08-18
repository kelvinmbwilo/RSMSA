<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rsmsa_referencedetails', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('referenceId');
			$table->integer('dataTypeId');
			$table->string('name');
			$table->string('dataTypeId');
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
		Schema::drop('rsmsa_referencedetails');
	}

}
