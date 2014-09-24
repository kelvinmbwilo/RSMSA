<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabaseCredentialsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsmsa_database_credentials', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('databaseType');
            $table->string('databaseName');
            $table->string('host');
            $table->string('username');
            $table->string('password');
            $table->string('charset');
            $table->string('prefix');
            $table->string('schema');
            $table->integer('port');
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
        Schema::drop('rsmsa_database_credentials');
    }

}
