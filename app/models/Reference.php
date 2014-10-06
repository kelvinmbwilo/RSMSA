<?php

class Reference extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_reference';


    protected  $guarded = array('$id');

    public function referenceDetails()
    {

        return $this->hasMany('ReferenceDetails', 'referenceId', 'id');
    }
    public function referencedData()
    {

        return $this->hasMany('DataReference', 'referenceId', 'id');
    }
    public function column()
    {

        return $this->hasMany('Column', 'referenceId', 'id');
    }
    public function Reference()
    {
        return $this->belongsTo('Data', 'hasReference', 'id');
    }
    public function refImport(){
        return $this->hasMany('Import', 'referenceId', 'id');
    }



}