<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionNatures extends Model
{
    protected $table = 'position_natures';

    protected function empInfo(){
    	return $this->hasMany('\App\EmpInfo', 'position_nature_id', 'id');
    }
}
