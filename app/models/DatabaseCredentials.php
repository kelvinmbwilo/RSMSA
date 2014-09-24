<?php

class DatabaseCredentials extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_database_credentials';


    protected  $guarded = array('$id');

    public function form()
    {
        return $this->belongsTo('Formm', 'formId', 'id');
    }




}

