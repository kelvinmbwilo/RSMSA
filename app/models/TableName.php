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

}
