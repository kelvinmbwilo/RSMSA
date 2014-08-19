<?php

class Data extends Eloquent {

/**
* The database table used by the model.
*
* @var string
*/
protected $table = 'rsmsa_data';


protected  $guarded = array('$id');

    public function table()
    {
        return $this->belongsTo('TableName', 'tableColumnId', 'id');
    }

    public function column(){
        return $this->belongsTo('Column', 'columnId', 'id');
    }

    public function location()
    {
        return $this->belongsTo('Location', 'locationId', 'id');
    }
    public function StakeHolderBranch()
    {
        return $this->belongsTo('StakeHolderBranch', 'stakeHolderId', 'id');
    }

    public function tag(){
        return $this->belongsTo('DataTag', 'datTag', 'datatagId');
    }

}

