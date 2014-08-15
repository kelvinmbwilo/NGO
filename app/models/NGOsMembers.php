<?php

class NGOsMembers extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'NGOs_members';
    protected $guarded = array("id");

    public function NGOs(){
        return $this->belongsTo('NGOs','NGOs_id', 'id');
    }


}
