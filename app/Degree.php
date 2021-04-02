<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    //
	protected $table = "degrees";

    public function college(){
    	return $this->belongsTo('App\Bldg', 'college_id', 'id');
    }

    
}
