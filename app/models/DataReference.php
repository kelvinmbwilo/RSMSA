<?php

class DataReference extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_referencedetails';


    protected  $guarded = array('$id');

    public function filedata()
    {
        return $this->belongsTo('FileData', 'dataId', 'id');
    }
    public function integerdata()
    {
        return $this->belongsTo('IntegerData', 'dataId', 'id');
    }
    public function stringdata()
    {
        return $this->belongsTo('StringData', 'dataId', 'id');
    }
    public function reference()
    {
        return $this->belongsTo('Reference', 'referenceId', 'id');
    }


}