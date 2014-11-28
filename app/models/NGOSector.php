<?php

class NGOSector extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'NGOs_Sector';
    protected $guarded = array("id");

    public function NGOs(){
        return $this->belongsTo('NGOs', 'NGO_id', 'id');
    }
    public function Sectors(){
        return $this->belongsTo('Sector', 'sector_id', 'id');
    }


}
