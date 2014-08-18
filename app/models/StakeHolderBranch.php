<?php

class StakeHolderBranch extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_stakeholderbranch';

    protected  $guarded = array('$id');

    public function integerdata()
    {
        return $this->hasMany('IntegerData', 'stakeHolderId', 'id');
    }

    public function stringdata()
    {
        return $this->hasMany('StringData', 'stakeHolderId', 'id');
    }

    public function filedata()
    {
        return $this->hasMany('FileData', 'stakeHolderId', 'id');
    }


    public function user()
    {
        return $this->hasMany('User', 'stakeholderBranchId', 'id');
    }

    public function stakeholder(){
        return $this->belongsTo('Stakeholder', 'stakeholderId', 'id');
    }


}
