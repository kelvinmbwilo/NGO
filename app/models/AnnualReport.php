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
        return $this->belongsTo('NGOs','NGO_id', 'id');
    }

     public function archivements(){
        return $this->hasMany('NGOArchivements','report_id', 'id');
    }
    public function targets(){
        return $this->hasMany('NGOTargets','report_id', 'id');
    }

    public function NGOChallanges(){
        return $this->hasMany('NGO_challanges','annual_report_id', 'id');
    }

    public function NGOPractices(){
        return $this->hasMany('NGO_practices','annual_report_id', 'id');
    }

    public function revenueIncome(){
        return $this->hasOne('RevenueIncome','report_id', 'id');
    }
    public function expenditure(){
        return $this->hasOne('Expendeture','report_id', 'id');
    }
}
