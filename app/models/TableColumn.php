<?php

class TableColumn extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_tablecolumn';

    protected  $guarded = array('$id');

    public function data()
    {
        return $this->hasMany('Data', 'tableColumnId', 'id');
    }


}
