<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Cys extends Model {

    protected $table = 'cys';

    protected $fillable = ["cy"];

    public function curricula()
    {
        return $this->belongsToMany('App\Curricula','cy_id');
    }

}