<?php

class StakeHolderBranch extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_stakeholderBranch';

    protected  $guarded = array('$id');

    public function data()
    {
        return $this->hasMany('Data', 'stakeHolderId', 'id');
    }

    public function user()
    {
        return $this->hasMany('User', 'stakeholderBranchId', 'id');
    }

}
