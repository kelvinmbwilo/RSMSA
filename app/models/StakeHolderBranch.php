<?php

class StakeHolderBranch extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_stakeholderBranch';

    protected  $guarded = array('$id');


    /**
     * Defining relatioship with Stakeholders Table
     * @return mixed
     */
    public function stakeholder()
    {
        return $this->belongsTo('Stakeholder', 'stakeholderId', 'id');
    }

}
