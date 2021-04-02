<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'degree_id', 'dept_id', 'chair_id',
    ];

    public function degree(){
        return $this->hasOne('App\Degree', 'id', 'degree_id');
    }

    public function user_info(){
        return $this->hasOne('App\Pi1','id','chair_id');
    }

    public function department(){
        return $this->hasOne('App\Departments','id','dept_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
}
