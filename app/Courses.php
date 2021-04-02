<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model {
    protected $table = 'courses';
	//
    //protected $connection = 'iusis';
    
    public function curriculaDetails()
    {
        return $this->belongsTo('App\CurriculaDetails');
    }

}
