<?php

class ReferenceImport extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_import_reference_mapping';


    protected  $guarded = array('$id');

    public function options()
    {
        return $this->belongsTo('Options', 'optionsId', 'id');
    }
    public function referenceDetails()
    {
        return $this->belongsTo('Reference', 'referenceId', 'id');
    }
    public function data()
    {
        return $this->belongsTo('Data', 'dataId', 'id');
    }


}

