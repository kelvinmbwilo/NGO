<?php

class Sector extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sectors';
    protected $guarded = array("id");

    public function NGOsSector(){
        return $this->hasMany('NGOSector', 'sector_id', 'id');
    }

    public function SectorArchivements(){
        return $this->hasMany('sector_archivements', 'sector_id', 'id');
    }

    public function SectorChallenges(){
        return $this->hasMany('sector_challanges', 'sector_id', 'id');
    }

    public function SectorPractices(){
        return $this->hasMany('SectorPractices', 'sector_id', 'id');
    }

    public function SectorRevenueIncome(){
        return $this->hasMany('revenue_income', 'sector_id', 'id');
    }

    public function Expendeture(){
        return $this->hasMany('expenditure', 'sector_id', 'id');
    }

}
