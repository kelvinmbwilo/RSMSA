<?php

class Import extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_import_form_mapping';


    protected  $guarded = array('$id');

    public function credentials(){
        return $this->belongsTo('DatabaseCredentials', 'databaseCredentialsId', 'id');
    }

    public function options()
    {
        return $this->belongsTo('Options', 'optionsId', 'id');
    }
    public function forms()
    {
        return $this->belongsTo('Formm', 'formId', 'id');
    }

}

