<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LecLab extends Model
{
    protected $table = "leclab_sched";

    protected $fillable = ['schedule_id', 'course_id', 'bldg_id', 'room_id', 'fr_id', 'to_id', 'day', 'emp_id', 'type', 'dept_id', 'course_type', 'instance'];

    public function sched(){
    	return $this->belongsTo('\App\Schedules', 'schedule_id');
    }

    public function course(){
    	return $this->hasOne('\App\Courses', 'id', 'course_id');
    }

    public function room()
    {
    	return $this->hasOne('\App\Rooms', 'id', 'room_id');
    }

    public function bldg()
    {
    	return $this->hasOne('\App\Bldg', 'id', 'bldg_id');
    }

    public function faculty(){
    	return $this->hasOne('\App\Pi1', 'id', 'emp_id');
    }


}
