<?php
/**
 * Created by PhpStorm.
 * User: amani
 * Date: 8/15/14
 * Time: 9:52 PM
 */
class SectorRevenueIncome extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sector_revenue_income';
    protected $guarded = array("id");

    public function Sector(){
        return $this->belongsTo('Sector','sector_id', 'id');
    }


}
