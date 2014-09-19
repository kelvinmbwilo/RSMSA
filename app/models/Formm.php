<?php

class Formm extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_form';


    protected  $guarded = array('$id');

    public function formData(){
        return $this->hasMany('FormData', 'formId', 'id');
    }
    public function form(){
        return $this->hasMany('Import', 'formId', 'id');
    }

}

