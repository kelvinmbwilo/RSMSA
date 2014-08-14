<?php
class ReferenceDetails extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_referencedetails';


    protected  $guarded = array('$id');

    public function reference()
    {
        return $this->belongsTo('Reference', 'referenceId', 'id');
    }


}