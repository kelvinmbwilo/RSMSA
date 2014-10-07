<?php

class ReferenceDatabaseCredentials extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_reference_database_credentials';


    protected  $guarded = array('$id');

    public function reference()
    {
        return $this->belongsTo('Reference', 'referenceId', 'id');
    }




}

