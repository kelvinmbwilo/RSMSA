<?php

class Stakeholder extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_stakeholders';

    protected  $guarded = array('$id');

    protected $fillable = array('name');

    public function branches(){
        return $this->hasMany('StakeHolderBranch');
    }

}
