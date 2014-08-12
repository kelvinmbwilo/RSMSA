<?php

class ColumnsTable extends Eloquent {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected  $guarded = array('$id');

}
