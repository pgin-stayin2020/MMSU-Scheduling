<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model {

    protected $table = 'schedules';

    protected $fillable = ['user_id','curricula_id', 'year', 'sem', 'cy_id', 'section', 'size'];

    public function lecLabs(){
    	return $this->hasMany('\App\LecLab', 'schedule_id', 'id');
    }

    public function user(){
    	return $this->belongsTo('\App\User', 'user_id');
    }
    
}
