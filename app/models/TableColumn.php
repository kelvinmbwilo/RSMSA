<?php

class TableColumn extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_tablecolumn';

    protected  $guarded = array('$id');

    public function table(){
        return $this->belongsTo('TableName', 'tableNameId', 'id');
    }

    public function column(){
        return $this->belongsTo('Column', 'columnsId', 'id');
    }

    public function datatype(){
        return $this->belongsTo('DataTypeDetails', 'datatypeDetailsId', 'id');
    }
}
