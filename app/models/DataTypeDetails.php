<?php

class DataTypeDetails extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_datatypedetails';

    protected  $guarded = array('$id');

    public function DataThatIs(){
        return $this->hasMany('TableColumn', 'datatypeDetailsId', 'id');
    }

    public function Column(){
        return $this->hasMany('Column', 'typeId', 'id');
    }
    public function options(){
        return $this->hasMany('Options', 'datatypeId', 'id');
    }


}
