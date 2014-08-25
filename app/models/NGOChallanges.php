<?php
/**
 * Created by PhpStorm.
 * User: amani
 * Date: 8/15/14
 * Time: 9:46 PM
 */

class NGOChallanges extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'NGO_challanges';
    protected $guarded = array("id");

    public function NGOs(){
        return $this->belongsTo('NGOs','NGOs_id', 'id');
    }

    public function AnnualReport(){
        return $this->belongsTo('NGOs','report_id', 'id');
    }



}