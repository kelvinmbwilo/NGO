<?php
/**
 * Created by PhpStorm.
 * User: amani
 * Date: 8/15/14
 * Time: 9:51 PM
 */
class EmploymentParticulars extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employment_particulars';
    protected $guarded = array("id");

    public function NGOs(){
        return $this->belongsTo('NGOs','NGOs_id', 'id');
    }

    public function country(){
        return $this->belongsTo('Country','nationality', 'id');
    }


}
