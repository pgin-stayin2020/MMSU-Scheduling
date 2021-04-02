<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpInfo extends Model
{
    protected $table = 'employment_info';

    public function positionNature(){
    	return $this->hasOne('\App\PositionNatures', 'id', 'position_nature_id');
    }

    public function personnelInfo(){
    	return $this->belongsTo('\App\Pi1','pi_number', 'id');
    }

    public function bldg()
    {
    	return $this->hasOne('\App\Bldg', 'id', 'unit_id');
    }

}
