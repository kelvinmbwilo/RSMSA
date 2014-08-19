<?php

class TableName extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_tablename';

    protected  $guarded = array('$id');

    public function column(){
        return $this->hasMany('Column', 'tableId', 'id');
    }
    public function tableColumn(){
        return $this->hasMany('TableColumn', 'tableNameId', 'id');
        return $this->hasMany('Column', 'tableId', 'id');
    }

    public function data(){
        return $this->hasMany('Data', 'tableColumnId', 'id');
    }

    public function tag(){
        return $this->hasMany('DataTag', 'tableId', 'id');
    }

}
