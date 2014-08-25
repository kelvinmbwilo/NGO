<?php
/**
 * Created by PhpStorm.
 * User: amani
 * Date: 8/15/14
 * Time: 9:45 PM
 */
class NGOArchivements extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'NGO_archivements';
    protected $guarded = array("id");

    public function NGOs(){
        return $this->belongsTo('NGOs','NGO_id', 'id');
    }

    public function AnnualReport(){
        return $this->belongsTo('NGOs','report_id', 'id');
    }



}