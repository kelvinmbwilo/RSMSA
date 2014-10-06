<?php

class ExcelCredential extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_excel_credentials';


    protected  $guarded = array('$id');

    public function form()
    {
        return $this->belongsTo('Formm', 'formId', 'id');
    }

    public function stakeholder()
    {
        return $this->belongsTo('StakeHolderBranch', 'stakeholderId', 'id');
    }




}