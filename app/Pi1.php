<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pi1 extends Model
{
    protected $table = 'pi1';

    protected $hidden = [ 'idnumber' ];

    public function empInfo(){
    	return $this->hasOne('\App\EmpInfo', 'pi_number');
    }

}
