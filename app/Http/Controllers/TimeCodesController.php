<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeCodesController extends Controller
{
    //
    public function index(){

    	$mins = "00";
    	for ($hour=7; $hour < 12;) {
    		$timeCodes = new \App\TimeCodes;
	    	$timeCodes->time = $hour . ":" . $mins . " PM";

	    	if( $mins == "00" ){
	    		$mins = "30";
	    	}else{
	    		$mins = "00";
	    		 $hour++;
	    	}

	    	$timeCodes->save();
    	}

    	$mins = "00";
    	for ($hour=12; $hour <= 12;) {
    		$timeCodes = new \App\TimeCodes;
	    	$timeCodes->time = $hour . ":" . $mins . " PM";

	    	if( $mins == "00" ){
	    		$mins = "30";
	    	}else{
	    		$mins = "00";
	    		 $hour++;
	    	}

	    	$timeCodes->save();
    	}

    	$mins = "00";
    	for ($hour=1; $hour <= 9;) {
    		$timeCodes = new \App\TimeCodes;
	    	$timeCodes->time = $hour . ":" . $mins . " PM";

	    	if( $mins == "00" ){
	    		$mins = "30";
	    	}else{
	    		$mins = "00";
	    		 $hour++;
	    	}

	    	$timeCodes->save();
    	}
    }
}
