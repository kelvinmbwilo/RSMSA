<?php

class Location extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_location';

    protected  $guarded = array('$id');

    public function data()
    {
        return $this->hasMany('Data', 'locationId', 'id');
    }

    public function getlevel(){
        return $this->belongsTo('LocationLevel', 'level', 'id');
    }



}
