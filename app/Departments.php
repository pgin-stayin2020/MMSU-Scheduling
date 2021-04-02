<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    //

    protected $table = "departments";

    public function user(){
        return $this->belongsTo('App\User','id', 'dept_id');
    }
}
