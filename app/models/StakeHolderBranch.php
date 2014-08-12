<?php

class StakeHolderBranch extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_stakeholderbranch';

    protected  $guarded = array('$id');

    public function stakeholder(){
        return $this->belongsTo('Stakeholder', 'stakeholderId', 'id');
    }

}
