<?php

class StakeHolderBranch extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_stakeholderbranch';

    protected  $guarded = array('$id');

    public function data()
    {
        return $this->hasMany('Data', 'stakeHolderId', 'id');
    }


    public function user()
    {
        return $this->hasMany('User', 'stakeholderBranchId', 'id');
    }

    public function stakeholder(){
        return $this->belongsTo('Stakeholder', 'stakeholderId', 'id');
    }

    public function location(){
        return $this->belongsTo('Location', 'locationId', 'id');
    }


}
