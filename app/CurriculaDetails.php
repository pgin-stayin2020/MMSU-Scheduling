<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculaDetails extends Model {

    protected $table = 'curricula_details';

    protected $fillable = ['curricula_ys_id', 'course_id'];

    protected $section;
	//

    public function course()
    {
        return $this->hasOne('App\Courses','id', 'course_id');
    }

    public function schedules($section='A', $pref_id = '13')
    {
        return $this->hasOne('App\Schedules', 'curricula_detail_id', 'id')->where('section',$section)->where('pref_id', $pref_id)->first();
    }



    public function sectionschedules()
    {

    }

    public function curriculaYss()
    {
        return $this->belongsToMany('App\CurriculaYss','curricula_detail_id');
    }

    public function curriculaYs()
    {
        return $this->hasOne('App\CurriculaYss', 'id','curricula_ys_id');
    }

    public function gradeDetails()
    {   
        return $this->hasMany('App\EnrollmentDetails', 'curricula_detail_id', 'id')->where('course_id', $this->course_id);
    }



}
