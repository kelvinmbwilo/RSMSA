<?php

class Reference extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_reference';


    protected  $guarded = array('$id');

    public function ReferenceDetails()
    {

        return $this->hasMany('ReferenceDetails', 'referenceId', 'id');
    }
    public function ReferencedData()
    {

        return $this->hasMany('DataReference', 'referenceId', 'id');
    }



}