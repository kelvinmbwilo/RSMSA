<?php

class DataReference extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_data_reference';


    protected  $guarded = array('$id');


    public function data()
    {
        return $this->belongsTo('Data', 'dataId', 'id');
    }

    public function referenceData(){
        return $this->belongsTo('Reference', 'referenceId', 'id');
    }

}