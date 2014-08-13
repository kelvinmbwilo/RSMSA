<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rsmsa_cars', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('carType');
            $table->string('plateNumber');
            $table->string('carMake');
            $table->string('carColor');
            $table->string('ownersName');
            $table->string('ownersContact');
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
		Schema::drop('rsmsa_cars');
	}

}
