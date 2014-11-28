<?php

class Sector extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sectors';
    protected $guarded = array("id");

    public function sectorAnnualReport(){
        return $this->hasMany('SectorAnnualReport', 'sector_id', 'id');
    }

    public function NGOsSector(){
        return $this->hasMany('NGOSector', 'sector_id', 'id');
    }

    public function SectorArchivements(){
        return $this->hasMany('SectorArchivements', 'sector_id', 'id');
    }

    public function SectorChallenges(){
        return $this->hasMany('SectorChallanges', 'sector_id', 'id');
    }

    public function SectorPractices(){
        return $this->hasMany('SectorPractices', 'sector_id', 'id');
    }

    public function SectorRevenueIncome(){
        return $this->hasMany('SectorRevenueIncome', 'sector_id', 'id');
    }

    public function Expendeture(){
        return $this->hasMany('SectorExpenditure', 'sector_id', 'id');
    }

}
