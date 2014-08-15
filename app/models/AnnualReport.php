<?php
/**
 * Created by PhpStorm.
 * User: amani
 * Date: 8/15/14
 * Time: 9:39 PM
 */
class AnnualReport extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'annual_report';
    protected $guarded = array("id");

    public function NGOs(){
        return $this->belongsTo('NGOs','NGOs_id', 'id');
    }

     public function NGOArchivements(){
        return $this->hasMany('NGO_archivements','annual_report_id', 'id');
    }

    public function NGOChallanges(){
        return $this->hasMany('NGO_challanges','annual_report_id', 'id');
    }

    public function NGOPractices(){
        return $this->hasMany('NGO_practices','annual_report_id', 'id');
    }

    public function RevenueIncome(){
        return $this->hasMany('RevenueIncome','annual_report_id', 'id');
    }
}
