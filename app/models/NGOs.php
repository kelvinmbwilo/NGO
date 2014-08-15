<?php

class NGOs extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'NGOs';
    protected $guarded = array("id");

    public function AnnualReport(){
        return $this->hasMany('annual_report', 'NGOs_id', 'id');
    }

    public function NGOsMembers(){
        return $this->hasMany('NGOs_members', 'NGOs_id', 'id');
    }

    public function NGOArchivements(){
        return $this->hasMany('NGO_archivements', 'NGOs_id', 'id');
    }
     public function NGOChallenges(){
        return $this->hasMany('NGO_challanges', 'NGOs_id', 'id');
    }
     public function NGOPractices(){
        return $this->hasMany('NGO_practices', 'NGOs_id', 'id');
    }
     public function Employment_particulars(){
        return $this->hasMany('employment_particulars', 'NGOs_id', 'id');
    }
     public function RevenueIncome(){
        return $this->hasMany('revenue_income', 'NGOs_id', 'id');
    }
     public function Expendeture(){
        return $this->hasMany('expenditure', 'NGOs_id', 'id');
    }

}
