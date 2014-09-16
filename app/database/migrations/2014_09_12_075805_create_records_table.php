<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rsmsa_records', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('formDataId');
            $table->integer('dataOptionId');
            $table->integer('categoryOptionId');
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
        Schema::drop('rsmsa_records');
    }


}
