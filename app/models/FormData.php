<?php

class FormData extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_form_data';


    protected  $guarded = array('$id');

       public function dataForm(){
        return $this->belongsTo('Data', 'dataId', 'id');
    }

    public function form()
    {
        return $this->belongsTo('Form', 'formId', 'id');
    }

}

