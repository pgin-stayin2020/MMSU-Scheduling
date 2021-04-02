<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    //
    protected $table = "rooms";

    public function college(){
    	return $this->belongsTo('\App\Bldg', 'bldg_id');
    }
}
