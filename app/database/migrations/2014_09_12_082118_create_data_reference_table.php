<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataReferenceTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rsmsa_data_reference', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('dataId');
            $table->integer('referenceId');
            $table->integer('keyColumnId');
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
        Schema::drop('rsmsa_data_reference');
    }


}
