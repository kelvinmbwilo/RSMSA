<?php

class ExcelMapping extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_excel_form_mapping';


    protected  $guarded = array('$id');

    public function form()
    {
        return $this->belongsTo('Formm', 'formId', 'id');
    }

    public function data()
    {
        return $this->belongsTo('Data', 'dataId', 'id');
    }
    public function option()
    {
        return $this->belongsTo('Options', 'optionsId', 'id');
    }
    public function reference()
    {
        return $this->belongsTo('Reference', 'dataId', 'id');
    }
    public function referenceDetails()
    {
        return $this->belongsTo('ReferenceDetails', 'optionsId', 'id');
    }




}