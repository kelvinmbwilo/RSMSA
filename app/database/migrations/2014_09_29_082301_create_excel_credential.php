<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcelCredential extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rsmsa_excel_credentials', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('filename');
			$table->string('path');
			$table->string('extension');
			$table->string('size');
			$table->string('type');
			$table->integer('stakeholderId');
			$table->integer('formId');
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
		Schema::drop('excel_credentials');
	}

}
