<?php
/**
 * Created by PhpStorm.
 * User: amani
 * Date: 8/15/14
 * Time: 9:45 PM
 */
class SectorArchivements extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sector_archivements';
    protected $guarded = array("id");

    public function Sector(){
        return $this->belongsTo('Sector','sector_id', 'id');
    }


}