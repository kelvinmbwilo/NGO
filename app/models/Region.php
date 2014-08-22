<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 2/17/14
 * Time: 9:04 PM
 */
class Region extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'regions';

    protected  $guarded = array('id');
    public $timestamps = false;

    public function district(){
        return $this->hasMany('District', 'region_id', 'id');
    }

    public function ngos(){
        return $this->hasMany("NGOs","region",'id');
    }


}