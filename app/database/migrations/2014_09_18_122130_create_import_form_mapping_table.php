<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportFormMappingTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsmsa_import_form_mapping', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('databaseName');
            $table->string('tableName');
            $table->string('databaseColumn');
            $table->integer('optionsId');
            $table->integer('dataId');
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
        Schema::drop('rsmsa_import_form_mapping');
    }

}
