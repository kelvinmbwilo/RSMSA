<?php

class CategoryOptions extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_category_options';


    protected  $guarded = array('$id');

       public function options()
    {
        return $this->belongsTo('Options', 'optionsId', 'id');
    }

    public function category()
    {
        return $this->belongsTo('Categories', 'categoryId', 'id');
    }



}

