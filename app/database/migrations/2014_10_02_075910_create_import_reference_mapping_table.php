<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportReferenceMappingTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsmsa_import_reference_mapping', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('databaseName');
            $table->string('tableName');
            $table->string('databaseColumn');
            $table->integer('optionsId');
            $table->integer('dataId');
            $table->integer('referenceId');
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
        Schema::drop('rsmsa_import_reference_mapping');
    }

}
