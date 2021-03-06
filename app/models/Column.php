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

    public function data(){
        return $this->hasMany('Data', 'columnId', 'id');
    }

    public function options(){
        return $this->hasMany('ColumnsOption', 'columnId', 'id');
    }

    public function datatype(){
        return $this->belongsTo('DataTypeDetails', 'typeId', 'id');
    }
    public function referenced(){
        return $this->belongsTo('Reference', 'referenceId', 'id');
    }

}
