<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStringdataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        //
        Schema::create('rsmsa_stringdata', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('tableColumnId');
            $table->string('value');
            $table->integer('datTag');
            $table->integer('locationId');
            $table->integer('stakeHolderId');
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
        //
        Schema::drop('rsmsa_stringdata');
    }


}
