<?php
/**
 * Created by PhpStorm.
 * User: amani
 * Date: 8/15/14
 * Time: 9:43 PM
 */
class SectorTargets extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sector_targets';
    protected $guarded = array("id");

    public function Sector(){
        return $this->belongsTo('Sector','sector_id', 'id');
    }

    public function AnnualReport(){
        return $this->belongsTo('NGOs','report_id', 'id');
    }



}
