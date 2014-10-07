<?php

class Data extends Eloquent {

/**
* The database table used by the model.
*
* @var string
*/
protected $table = 'rsmsa_data';


protected  $guarded = array('$id');

    public function options()
    {
        return $this->hasMany('DataOptions', 'dataId', 'id');
    }

    public function referenceData(){
        return $this->hasMany('Reference', 'referenceId', 'id');
    }

    public function dataReference()
    {
        return $this->hasMany('DataReference', 'dataId', 'id');
    }
    public function referenceMapping()
    {
        return $this->hasMany('DataReferenceMapping', 'dataId', 'id');
    }
    public function hasReference()
    {
        return $this->belongsTo('Reference', 'hasReference', 'id');
    }
    public function data(){
        return $this->hasMany('ReferenceImport', 'dataId', 'id');
    }

}

