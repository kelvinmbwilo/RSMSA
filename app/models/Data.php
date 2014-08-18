<?php

class Data extends Eloquent {

/**
* The database table used by the model.
*
* @var string
*/
protected $table = 'rsmsa_data';


protected  $guarded = array('$id');

    public function tableColumn()
    {
        return $this->belongsTo('TableColumn', 'tableColumnId', 'id');
    }
    public function location()
    {
        return $this->belongsTo('Location', 'locationId', 'id');
    }
    public function StakeHolderBranch()
    {
        return $this->belongsTo('StakeHolderBranch', 'stakeHolderId', 'id');
    }

}

