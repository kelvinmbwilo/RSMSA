<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStakeholderBranchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rsmsa_stakeholderBranch', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('locationId');
			$table->string('stakeholderId');
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
		Schema::drop('rsmsa_stakeholderBranch');
	}

}
