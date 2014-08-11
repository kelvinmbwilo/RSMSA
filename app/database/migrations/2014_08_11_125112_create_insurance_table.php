<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rsmsa_insurance', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('registrationNumber');
            $table->string('insuranceNumber');
            $table->string('dateOfIssue');
            $table->string('expiryDate');
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
		Schema::drop('rsmsa_insurance');
	}

}
