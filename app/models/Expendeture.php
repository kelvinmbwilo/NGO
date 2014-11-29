<?php
/**
 * Created by PhpStorm.
 * User: amani
 * Date: 8/15/14
 * Time: 9:55 PM
 */
class Expendeture extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expenditure';
    protected $guarded = array("id");

    public function NGOs(){
        return $this->belongsTo('NGOs','NGO_id', 'id');
    }

    public function AnnualReport(){
        return $this->belongsTo('AnnualReport','report_id', 'id');
    }



}
