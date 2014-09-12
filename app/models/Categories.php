<?php

class Categories extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_categories';


    protected  $guarded = array('$id');

    public function category()
    {
        return $this->hasMany('CategoryOptions', 'categoryId', 'id');
    }
    public function hasCategories()
    {
        return $this->belongsTo('Options', 'hasCategories', 'id');
    }


}

