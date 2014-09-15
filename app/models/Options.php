<?php

class Options extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_options';


    protected  $guarded = array('$id');

    public function categoryOptions()
    {
        return $this->hasMany('CategoryOptions', 'optionsId', 'id');
    }

    public function dataOptions()
    {
        return $this->hasMany('DataOptions', 'optionsId', 'id');
    }

    public function mapping()
{
    return $this->hasMany('DataReferenceMapping', 'optionsId', 'id');
}
    public function category()
    {
        return $this->belongsTo('Categories', 'hasCategories', 'id');
    }


}

