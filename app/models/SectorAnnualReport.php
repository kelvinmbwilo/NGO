<?php
/**
 * Created by PhpStorm.
 * User: amani
 * Date: 8/15/14
 * Time: 9:39 PM
 */
class SectorAnnualReport extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sector_annual_report';
    protected $guarded = array("id");

    public function sector(){
        return $this->belongsTo('Sector','sector_id', 'id');
    }

     public function archivements(){
        return $this->hasMany('SectorArchivements','report_id', 'id');
    }
    public function targets(){
        return $this->hasMany('SectorTargets','report_id', 'id');
    }

    public function SectorChallanges(){
        return $this->hasMany('SectorChallanges','report_id', 'id');
    }

    public function SectorPractices(){
        return $this->hasMany('SectorPractices','report_id', 'id');
    }

    public function SectorRevenueIncome(){
        return $this->hasOne('SectorRevenueIncome','report_id', 'id');
    }
    public function expenditure(){
        return $this->hasOne('SectorExpendeture','report_id', 'id');
    }
}
