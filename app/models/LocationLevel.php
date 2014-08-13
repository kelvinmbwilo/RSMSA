<?php

class LocationLevel extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_locationlevel';

    protected  $guarded = array('$id');

    public function locations(){
        return $this->hasMany('Location', 'locationLevelId', 'id');
    }

}
