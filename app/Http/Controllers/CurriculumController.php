<?php

namespace App\Http\Controllers;

use App\Curricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $degreeID = Auth::user()->degree_id;

        $curriculas = Curricula::where('degree_id', $degreeID)->get();

        return view('curriculums.index',compact(['curriculas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $degreeID = Auth::user()->degree_id;

        $curriculas = Curricula::where('degree_id', $degreeID)->get();

        return view('curriculums.index',compact(['curriculas']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getYear(){
        $degreeID = Auth::user()->degree_id;

        $curricula_id = request('curricula');

        $curriculas = Curricula::where('id', $curricula_id)->first();
        
        $years = $curriculas->curriculaYss()->distinct()->get(['year']);

        echo <<< sid
            <option value="">All</option>
sid;

        foreach ($years as $year) {
            echo <<< sid
                <option value="{$year->year}">{$year->year}</option>
sid;
        }
    }

    public function getSem(){
        $degreeID = Auth::user()->degree_id;

        $curricula_id = request('curricula');
        $year = request('year');
        $curriculas = Curricula::where('id', $curricula_id)->first();
        
        $sems = $curriculas->curriculaYss()->where('year',$year)->distinct()->get(['sem']);
        echo <<< sid
            <option value="">All</option>
sid;
        foreach ($sems as $sem) {
            
            echo <<< sid
                <option value="{$sem->sem}">{$sem->sem}</option>
sid;
        }
    }

    public function getResult()
    {
        $degreeID = Auth::user()->degree_id;

        $curricula_id = request('curricula');
        $raw = "";

        $year = request('year');
        if($year != ''){
            $raw = "year = ". $year;
            $sem = request('sem');
            if($sem != ''){
                $raw .= " AND sem = " . $sem;
            }
        }else{
            $sem = request('sem');
            if($sem != ''){
                $raw .= "sem = " . $sem;
            }
        }

        $curriculas = Curricula::where('id', $curricula_id)->first();
        if($raw != ''){
            $curriculaYss = $curriculas->curriculaYss()->whereRaw($raw)->get();
        }else{
            $curriculaYss = $curriculas->curriculaYss;
        }
        
        return view('curriculums.getResult', compact('curriculaYss'));
    }
}
