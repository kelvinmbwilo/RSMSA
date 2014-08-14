<?php
class ReferenceDetails extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_reference';


    protected  $guarded = array('$id');

    public function Reference()
    {
        return $this->belongsTo('Reference', 'referenceId', 'id');
    }


}