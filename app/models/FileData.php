<?php
/**
 * Created by PhpStorm.
 * User: Isaiah
 * Date: 8/17/14
 * Time: 2:13 PM
 */
class FileData extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rsmsa_filedata';


    protected  $guarded = array('$id');

    public function tableColumn()
    {
        return $this->belongsTo('TableColumn', 'tableColumnId', 'id');
    }
    public function location()
    {
        return $this->belongsTo('Location', 'locationId', 'id');
    }
    public function StakeHolderBranch()
    {
        return $this->belongsTo('StakeHolderBranch', 'stakeHolderId', 'id');
    }

}