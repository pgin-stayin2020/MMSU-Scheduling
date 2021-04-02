<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Curricula extends Model {

    protected $table = 'curricula';


    protected $fillable = [

        'degree_id', 'major_id', 'minor_id', 'description', 'cy_id'
    ];


    public function cys()
    {
        return $this->hasOne('App\Cys','id','cy_id');
    }

    public function curriculaYss()
    {
        return $this->hasMany('App\CurriculaYss', 'curricula_id');
    }

    public function degree()
    {
        return $this->hasOne('App\Degree', 'id', 'degree_id');
    }
}

