<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcelMapping extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rsmsa_excel_form_mapping', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('excelColumn');
			$table->integer('optionsId');
			$table->integer('dataId');
			$table->integer('formId');
			$table->string('type');
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
		Schema::drop('rsmsa_excel_form_mapping');
	}

}
