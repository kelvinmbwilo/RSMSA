<?php

class Records extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_records';


    protected  $guarded = array('$id');

    public function formdetails()
    {
        return $this->belongsTo('Formm', 'formDataId', 'id');
    }
    public function data()
    {
        return $this->belongsTo('Data', 'dataOptionId', 'id');
    }

    public function option(){
        return $this->belongsTo('Options', 'categoryOptionId', 'id');
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

