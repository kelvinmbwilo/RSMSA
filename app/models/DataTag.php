<?php
/**
 * Created by PhpStorm.
 * User: Isaiah
 * Date: 8/19/14
 * Time: 3:36 PM
 */

class DataTag extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table ='rsmsa_datatag';

    protected  $guarded = array('$id');

    public function datatag(){
        return $this->hasMany('Data', 'datTag', 'datatagId');
    }

    public function formDetails(){
        return $this->belongsTo('Formm', 'tableId', 'id');
    }

}