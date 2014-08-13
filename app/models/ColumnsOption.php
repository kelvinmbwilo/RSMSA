<?php

class ColumnsOption extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_columnsoption';

    protected  $guarded = array('$id');

    public function column(){
        return $this->belongsTo('Column', 'columnId', 'id');
    }



}
