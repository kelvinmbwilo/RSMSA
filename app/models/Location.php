<?php

class Location extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_location';

    protected  $guarded = array('$id');

}