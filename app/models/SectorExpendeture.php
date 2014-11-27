<?php
/**
 * Created by PhpStorm.
 * User: amani
 * Date: 8/15/14
 * Time: 9:55 PM
 */
class SectorExpendeture extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Sector_expenditure';
    protected $guarded = array("id");

    public function Sector(){
        return $this->belongsTo('Sector','sector_id', 'id');
    }



}
