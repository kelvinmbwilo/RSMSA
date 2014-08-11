<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rsmsa_license', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('licenseNumber');
            $table->string('name');
            $table->string('dateOfBirth');
            $table->string('dateOfIssue');
            $table->string('placeOfResidence');
            $table->string('CategoryOfVehicle');
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
		Schema::drop('rsmsa_license');
	}

}
