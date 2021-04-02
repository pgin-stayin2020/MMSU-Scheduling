<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculaYss extends Model {

    protected $table = 'curricula_yss';

	//
    public function curriculaDetails()
    {
        return $this->hasMany('App\CurriculaDetails','curricula_ys_id');
    }


    public function curricula()
    {
        return $this->belongsToMany('App\Curricula', 'curricula_id');
    }

    public function curriculum()
    {
        return $this->hasOne('App\Curricula', 'id', 'curricula_id');
    }
}
