<?php namespace App;

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bldg extends Model
{
    //
	protected $table = "bldgs";

    public function degrees(){
    	return $this->hasMany('App\Degree', 'college_id');
    }

    public function rooms()
    {
    	return $this->hasMany('App\rooms', 'bldg_id', 'id');
    }
}