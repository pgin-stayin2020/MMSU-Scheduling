<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    public function scopePresentPref($query)
    {
        return $query->where('status',1)->first();
    }

    public function cys()
    {
        return $this->hasOne('App\Cys', 'id', 'cy_id');
    }

    public function getSyAttribute()
    {
        $sems = array('1' => 'First Sem', '2' => 'Second Sem', '3' => 'Summer');
        
        return $sems[$this->sem] . ' - SY ' . $this->cys->cy;
    }
    
    public function getAyAttribute()
    {
        return $this->cys->cy;
    }

    public function getSemesterAttribute()
    {
        return $this->sems[$this->sem];
    }
}
