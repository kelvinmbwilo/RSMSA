<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableColumnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rsmsa_tablecolumn', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tableNameId');
			$table->integer('columnsId');
			$table->integer('columnsOptionsId');
			$table->integer('datatypeDetailsId');
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
		Schema::drop('rsmsa_tablecolumn');
	}

}
