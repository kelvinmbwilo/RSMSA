<?php

class DataReferenceMapping extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_data_reference_mapping';


    protected  $guarded = array('$id');


    public function data()
    {
        return $this->belongsTo('Data', 'dataId', 'id');
    }
    public function options(){
        return $this->belongsTo('Options', 'optionsId', 'id');
    }

    public function referenceData(){
        return $this->belongsTo('ReferenceDetails', 'referenceId', 'id');
    }

}