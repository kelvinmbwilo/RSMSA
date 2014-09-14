<?php

class DataOptions extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_data_options';


    protected  $guarded = array('$id');

    public function options()
    {
        return $this->belongsTo('Options', 'optionsId', 'id');
    }

    public function data()
    {
        return $this->belongsTo('Data', 'dataId', 'id');
    }



}

