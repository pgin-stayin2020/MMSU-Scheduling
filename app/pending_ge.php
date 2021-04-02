<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pending_ge extends Model
{
    //
    protected $table = "pending_ge";

    protected $fillable = ["schedule_id", "course_id", "user_id"];

    public function schedule(){
    	return $this->belongsTo('\App\Schedules', 'schedule_id');
    }
}
