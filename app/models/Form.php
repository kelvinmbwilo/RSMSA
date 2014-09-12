<?php

class Form extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_form';


    protected  $guarded = array('$id');

    public function forms(){
        return $this->hasMany('FormData', 'formId', 'id');
    }

}

