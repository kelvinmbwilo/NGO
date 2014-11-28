<?php
/**
 * Created by PhpStorm.
 * User: amani
 * Date: 8/15/14
 * Time: 9:48 PM
 */
class NGOPractices extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'NGO_practices';
    protected $guarded = array("id");

    public function NGOs(){
        return $this->belongsTo('NGOs','NGO_id', 'id');
    }

    public function AnnualReport(){
        return $this->belongsTo('AnnualReport','report_id', 'id');
    }



}