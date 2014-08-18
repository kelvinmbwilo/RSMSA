<?php

class Column extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_columns';

    protected  $guarded = array('$id');

    public function table()
    {
        return $this->belongsTo('TableName', 'tableId', 'id');
    }

    public function options(){
        return $this->hasMany('ColumnsOption', 'columnId', 'id');
    }

}
