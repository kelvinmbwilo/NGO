<?php

class NGOs extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'NGOs';
    protected $guarded = array("id");

    public function annualReport(){
        return $this->hasMany('AnnualReport', 'NGO_id', 'id');
    }

    public function NGOsMembers(){
        return $this->hasMany('NGOsMembers', 'NGO_id', 'id');
    }

    public function NGOArchivements(){
        return $this->hasMany('NGO_archivements', 'NGOs_id', 'id');
    }
     public function NGOChallenges(){
        return $this->hasMany('NGO_challanges', 'NGO_id', 'id');
    }
     public function NGOPractices(){
        return $this->hasMany('NGO_practices', 'NGOs_id', 'id');
    }
     public function employmentparticulars(){
        return $this->hasMany('EmploymentParticulars','NGO_id', 'id');
    }
     public function RevenueIncome(){
        return $this->hasMany('revenue_income', 'NGOs_id', 'id');
    }
     public function Expendeture(){
        return $this->hasMany('expenditure', 'NGOs_id', 'id');
    }

    public function ndistrict(){
        return $this->belongsTo('District','district','id');
    }
    public function nregion(){
        return $this->belongsTo('Region', 'region', 'id');
    }
}
