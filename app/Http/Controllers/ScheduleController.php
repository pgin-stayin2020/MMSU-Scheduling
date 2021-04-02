<?php

namespace App\Http\Controllers;

use App\Bldg;
use App\Courses;
use App\Curricula;
use App\Cys;
use App\Degree;
use App\EmpInfo;
use App\LecLab;
use App\Pi1;
use App\PositionNatures;
use App\Rooms;
use App\Schedules;
use App\TimeCodes;
use App\User;
use App\lecLabs;
use App\pending_ge;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
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

        $cys = Cys::orderBy('cy', 'DESC')->get();

        return view('schedules.index', compact(['curriculas', 'cys']));
    }

    public function view()
    {

        $users = User::where('designation', 1)->get();

        $cys = Cys::orderBy('cy', 'DESC')->get();

        return view('schedules.view', compact(['users', 'cys']));
    }

    public function delete(Request $request)
    {
        $schedule = Schedules::where('id', request('schedule_id'))->first();
        if ($schedule->delete()) {
            return 0;
        }else{
            return 1;
        }
    }

    public function approve(Request $request)
    {
        $schedule = Schedules::where('id', request('schedule_id'))->first();
        $schedule->status = 1;
        if($schedule->save()){
            return 0;
        }else{
            return 1;
        }
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

        $bldgs = Bldg::all();

        $current_month = date("m");
        $current_year = date("Y");
        if($current_month > 2){
               $SY = $current_year . '-' . ($current_year + 1);
        }else if($current_month < 6)
               $SY = ($current_year - 1) . '-' . $current_year;


        $cysObj = Cys::where("cy", $SY)->first();

        if (empty($cysObj)) {
            $cysObj = Cys::create([
                "cy" => $SY
            ]);
        }

        return view('schedules.create',compact(['curriculas', 'bldgs', 'cysObj']));
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
        $schedule = Schedules::where('id', $id)->first();

        $bldgs = Bldg::all();

        return view("schedules.edit", compact(['schedule', 'bldgs']));
    }

    public function pending($id){
        $schedule = Schedules::where('id', $id)->first();

        $bldgs = Bldg::all();

        return view("schedules.pending", compact(['schedule', 'bldgs']));
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

        $curricula_id = request('curricula_id');

        $curriculas = Curricula::where('id', $curricula_id)->first();

        $years = $curriculas->curriculaYss()->distinct()->get(['year']);
        return count($years);
    }

    public function getSem(){
        $degreeID = Auth::user()->degree_id;

        $curricula_id = request('curricula_id');

        $year = request('year');

        $curriculas = Curricula::where('id', $curricula_id)->first();

        $sems = $curriculas->curriculaYss()->where('year',$year)->distinct()->get(['sem']);

        echo '<option value="">Semester</option>';

        foreach ($sems as $sem) {
            echo <<< sid
                <option value="{$sem->sem}">{$sem->sem}</option>
sid;
        }
    }

    public function getCurriculaForm(Request $request)
    {
        $curriculaYss=$teachingFaculties=$bldgs=$timeCodes=null;
        $request = request()->all();
        $curricula_id = request('curricula_id');

        $year = request('year');

        $sem = request('sem');

        $curriculas = Curricula::where('id', $curricula_id)->first();

        $curriculaYss = $curriculas->curriculaYss()->where('year',$year)->where('sem',$sem)->get();

        $teachingFaculties = PositionNatures::first()->empInfo;

        $bldgs = Bldg::all();

        $timeCodes = TimeCodes::all();
        return view('schedules.getCurriculaForm', compact(['curriculaYss', 'teachingFaculties', 'request', 'bldgs', 'timeCodes']));
    }

    public function generateSectionReport(Request $request)
    {
        $degreeID = Auth::user()->degree_id;
        $curriculas = null;
        $curriculas = Curricula::where('degree_id', $degreeID)->get();
        $cys = null;
        $cys = Cys::orderBy('cy', 'DESC')->get();

        return view('schedules.generateSectionReport', compact(['curriculas', 'cys']));
    }

    public function generateFacultyReport(Request $request)
    {
        $employees = null;
        if(Auth::user()->designation == 1){
            $dept_id = Auth::user()->dept_id;
            $employees = EmpInfo::where('dept_id', $dept_id)->where('position_nature_id', 1)->get();
        }elseif(Auth::user()->designation == 2){

            $employees = EmpInfo::where('unit_id', Auth::user()->department->unit_id)->where('position_nature_id', 1)->get();
        }else{
            $employees = EmpInfo::where('position_nature_id', 1)->get();
        }

        $cyes = null;
        $cys = Cys::orderBy('cy', 'DESC')->get();

        return view('schedules.generateFacultyReport', compact(['employees', 'cys']));
    }

    public function generateRoomReport(Request $request)
    {
        $bldgs = null;
        if(Auth::user()->designation == 2){
            $bldgs = Bldg::where('id',Auth::user()->degree->college->id)->get();

        }else{
            $bldgs = Bldg::all();
        }
        $cys = null;
        $cys = Cys::orderBy('cy', 'DESC')->get();

        return view('schedules.generateRoomReport', compact(['bldgs', 'cys']));
    }

    public function setRooms(Request $request)
    {
        $roomType = request('roomType');
        if ($roomType != "all") {

            $rooms = Rooms::where('bldg_id', request('bldg_id'))->where('room_type_id',$roomType)->orderBy('number')->get();

        }else{
            $rooms = Rooms::where('bldg_id', request('bldg_id'))->orderBy('number')->get();
        }
        echo "<option value = 'all'>All</option>";
        foreach ($rooms as $room) {
            echo "<option value = '$room->id'>$room->number</option>";
        }
    }

    public function print(Request $request)
    {
        return view('schedules.print', compact('request'));

    }

    public function listSchedule()
    {
        $raw = "";
        $schedules = null;
        $report = null;
        $year = request('year');

        if($year != 'all'){
            $raw = "year = ". $year;
            $sem = request('sem');
            if($sem != 'all'){
                $raw .= " AND sem = " . $sem;
            }
        }else{
            $sem = request('sem');
            if($sem != 'all'){
                $raw .= "sem = " . $sem;
            }
        }

        if ($raw == "") {
            $schedules = \App\Schedules::where('user_id', Auth::user()->id)->where('cy_id', request('cy'))->get();
        }else{
            $schedules = \App\Schedules::whereRaw($raw)->where('cy_id', request('cy'))->get();
        }

        $report = request('report');

        return view('schedules.listSchedule', compact(['schedules', 'report']));
    }

    public function listViewSchedule()
    {
        $schedules = null;
        $schedules = \App\Schedules::where('user_id', request('dept_id'))->where('cy_id', request('cy'))->get();

        return view('schedules.listViewSchedule', compact(['schedules']));
    }

    public function checkSection(Request $request)
    {
        if (!is_null(request('year')) && !is_null(request('sem')) && !is_null(request('cy')) && !is_null(request('section'))) {
            $schedule = Schedules::where('year', request('year'))->where('sem', request('sem'))->where('cy_id', request('cy'))->where('section', request('section'))->first();
            if (is_null($schedule)) {
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }

    public function listPending()
    {
        $raw = "";

        $year = request('year');

        if(!is_null($year)){
            $raw = "year = ". $year;
            $sem = request('sem');
            if(!is_null($sem)){
                $raw .= " AND sem = " . $sem;
            }
        }else{
            $sem = request('sem');
            if(!is_null($sem)){
                $raw .= "sem = " . $sem;
            }
        }

        $cy = request('cy');
        $schedules = null;
        if ($raw == "") {
            $schedules = \App\pending_ge::where('user_id', Auth::user()->dept_id)->groupBy('schedule_id')->whereHas('schedule', function($q) use($cy){
                    $q->where('cy_id', $cy);
                })->get();
        }else{
            $schedules = \App\pending_ge::where('user_id', Auth::user()->dept_id)->groupBy('schedule_id')->whereHas('schedule', function($q) use($raw, $cy){
                    $q->whereRaw($raw)->where('cy_id', $cy);
                })->get();
        }

        return view('schedules.listPending', compact(['schedules']));
    }

    public function getRooms(){
        $type = request('type');
        if(is_array(request('bldgs'))){
            $bldg_ids = request('bldgs');

            foreach ($bldg_ids as $bldg_id) {
                $bldg = Bldg::where('id', $bldg_id)->first();

                if ($type == 'lec') {
                    $rooms = Rooms::where('bldg_id', $bldg_id)->where('room_type_id', 1)->orderBy('number')->get();
                }else{
                    $rooms = Rooms::where('bldg_id', $bldg_id)->where('room_type_id', '<>', 1)->orderBy('number')->get();
                }

                echo "<optgroup label='$bldg->bldg'>";
                foreach ($rooms as $room) {
                    echo "<option value = '$room->id'>$room->number</option>";
                }
            }
        }else{
            $bldg = request('bldgs');

            if($bldg == "TBA" || $bldg == ""){
                echo "<option value='TBA'>TBA</option>";
            }else{

                $course = Courses::where('id', request('course_id'))->first();

                if ($type == 'lec') {
                    $rooms = Rooms::where('bldg_id', $bldg)->orderBy('number')->get();
                }else{
                    $rooms = Rooms::where('bldg_id', $bldg)->where('room_type_id', '<>', 1)->orderBy('number')->get();
                }

                foreach ($rooms as $room) {
                    echo "<option value = '$room->id'>$room->number</option>";
                }
            }


        }

    }

    public function getEditForm(Request $request)
    {
        $schedule = Schedules::where('id', request('schedule_id'))->first();

        $lecLabs = $schedule->lecLabs()->orderBy('course_id')->get();

        $curricula = Curricula::where('id', $schedule->curricula_id)->first();

        $curriculaYss = $curricula->curriculaYss()->where('year',$schedule->year)->where('sem',$schedule->sem)->get();

        $sched = array();

        foreach ($lecLabs as $lecLab) {
            if ($lecLab->type == 1) {
                $sched[$lecLab->course_id][$lecLab->instance]['lec_day'] = explode("-", $lecLab->day);
                $sched[$lecLab->course_id][$lecLab->instance]['lec_bldg'] = $lecLab->bldg_id;
                $sched[$lecLab->course_id][$lecLab->instance]['lec_room'] = $lecLab->room_id;
                $sched[$lecLab->course_id][$lecLab->instance]['lec_fr'] = $lecLab->fr_id;
                $sched[$lecLab->course_id][$lecLab->instance]['lec_to'] = $lecLab->to_id;
                $sched[$lecLab->course_id][$lecLab->instance]['lec_dept'] = $lecLab->dept_id;
                $sched[$lecLab->course_id][$lecLab->instance]['lec_type'] = $lecLab->course_type;
                $lecfac = "";
                ($lecLab->emp_id == 0 ? $lecfac = "TBA" : $lecfac =  $lecLab->emp_id);
                $sched[$lecLab->course_id][$lecLab->instance]['lec_fac'] = $lecfac;
                $sched[$lecLab->course_id]['course'] = Courses::where('id',$lecLab->course_id)->first();
            }
            elseif ($lecLab->type == 2) {
                //$count_lab = count(LecLab::where('schedule_id', $schedule->id)->where('course_id', $lecLab->course_id)->where('type', 2)->get());
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_day'] = explode("-", $lecLab->day);
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_bldg'] = $lecLab->bldg_id;
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_room'] = $lecLab->room_id;
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_fr'] = $lecLab->fr_id;
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_to'] = $lecLab->to_id;
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_type'] = $lecLab->course_type;
                $labfac = "";
                ($lecLab->emp_id == 0 ? $labfac = "TBA" : $labfac =  $lecLab->emp_id);
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_fac'] = $labfac;
            }
        }

        $courseIds = array();

        foreach($curriculaYss as $curriculaYs){
            $curriculaDetails = $curriculaYs->curriculaDetails;
            foreach ($curriculaDetails as $curriculaDetail){
                $courseIds[] = $curriculaDetail->course->id;
            }
        }

        $timeCodes = TimeCodes::all();
        $teachingFaculties = PositionNatures::first()->empInfo;
        $bldgs = Bldg::all();
        $edit = true;
        return view("schedules.generatedSchedule", compact(["sched", "courseIds", "request", "timeCodes", "teachingFaculties", "bldgs", "edit"]));
    }

    public function displaySchedule(Request $request)
    {
        $schedule = Schedules::where('id', request('schedule_id'))->first();

        $lecLabs = $schedule->lecLabs()->orderBy('course_id')->get();

        $curricula = Curricula::where('id', $schedule->curricula_id)->first();

        $curriculaYss = $curricula->curriculaYss()->where('year',$schedule->year)->where('sem',$schedule->sem)->get();

        $sched = array();

        foreach ($lecLabs as $lecLab) {
            if ($lecLab->type == 1) {
                $sched[$lecLab->course_id][$lecLab->instance]['lec_day'] = explode("-", $lecLab->day);
                $sched[$lecLab->course_id][$lecLab->instance]['lec_bldg'] = $lecLab->bldg_id;
                $sched[$lecLab->course_id][$lecLab->instance]['lec_room'] = $lecLab->room_id;
                $sched[$lecLab->course_id][$lecLab->instance]['lec_fr'] = $lecLab->fr_id;
                $sched[$lecLab->course_id][$lecLab->instance]['lec_to'] = $lecLab->to_id;
                $sched[$lecLab->course_id][$lecLab->instance]['lec_dept'] = $lecLab->dept_id;
                $sched[$lecLab->course_id][$lecLab->instance]['lec_type'] = $lecLab->course_type;
                $lecfac = "";
                ($lecLab->emp_id == 0 ? $lecfac = "TBA" : $lecfac =  $lecLab->emp_id);
                $sched[$lecLab->course_id][$lecLab->instance]['lec_fac'] = $lecfac;
                $sched[$lecLab->course_id]['course'] = Courses::where('id',$lecLab->course_id)->first();
            }
            elseif ($lecLab->type == 2) {
                //$count_lab = count(LecLab::where('schedule_id', $schedule->id)->where('course_id', $lecLab->course_id)->where('type', 2)->get());
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_day'] = explode("-", $lecLab->day);
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_bldg'] = $lecLab->bldg_id;
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_room'] = $lecLab->room_id;
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_fr'] = $lecLab->fr_id;
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_to'] = $lecLab->to_id;
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_type'] = $lecLab->course_type;
                $labfac = "";
                ($lecLab->emp_id == 0 ? $labfac = "TBA" : $labfac =  $lecLab->emp_id);
                $sched[$lecLab->course_id . "-lab"][$lecLab->instance]['lab_fac'] = $labfac;
            }
        }

        $courseIds = array();

        foreach($curriculaYss as $curriculaYs){
            $curriculaDetails = $curriculaYs->curriculaDetails;
            foreach ($curriculaDetails as $curriculaDetail){
                $courseIds[] = $curriculaDetail->course->id;
            }
        }

        return view("schedules.displaySchedule", compact(["sched", "courseIds", "schedule"]));
    }

    public function displayScheduleTable(Request $request){
        return view("schedules.displayScheduleTable", compact(["request"]));
    }

    public function displaySectionSchedule(Request $request)
    {

        return view("schedules.displaySectionSchedule", compact(["request"]));
    }

    public function displaySectionScheduleTable(Request $request)
    {

        return view("schedules.displaySectionScheduleTable", compact(["request"]));
    }

    public function displayFacultySchedule(Request $request)
    {

        return view("schedules.displayFacultySchedule", compact(["request"]));
    }

    public function displayFacultyScheduleTable(Request $request)
    {
        return view("schedules.displayFacultyScheduleTable", compact($request));
    }

    public function displayRoomSchedule(Request $request)
    {

        return view("schedules.displayRoomSchedule", compact(["request"]));
    }

    public function displayRoomScheduleTable(Request $request){

        return view("schedules.displayRoomScheduleTable", compact(["request"]));
    }

    public function fillTable(Request $request){

        $cy = $request->cy;

        $sem = $request->sem;

        $lecLabsArr = array();

        if ($request->type == 'room') {
            $rooms = \App\Rooms::where('bldg_id', $request->bldg)->where('id',$request->room)->get();

            if ($request->roomType != 'all') {
                if ($request->room == 'all') {
                    $rooms = \App\Rooms::where('bldg_id', $request->bldg)->where('room_type_id',$request->roomType)->orderBy('number')->get();
                }
            }else{
                if ($request->room == 'all') {
                    $rooms = \App\Rooms::where('bldg_id', $request->bldg)->orderBy('number')->get();
                }
            }

            foreach($rooms as $room){
                $lecLabs = \App\LecLab::where('room_id', $room->id)->whereHas('sched', function($q) use($cy, $sem){
                    $q->where("cy_id", $cy)->where("sem", $sem);
                })->where('fr_id', '<>', 0)->get();

                if(count($lecLabs) > 0){
                    foreach ($lecLabs as $lecLab) {
                        $lecLab['course'] = $lecLab->course;
                        $lecLab['bldg'] = $lecLab->bldg;
                        $lecLab['room'] = $lecLab->room;
                        $lecLab['day'] = explode("-", $lecLab->day);
                        if ($lecLab->faculty != NULL) {
                            $lecLab['faculty'] = $lecLab->faculty;
                        }
                    }
                    $lecLabsArr[$room->id] = array();
                    $lecLabsArr[$room->id] = $lecLabs;
                }
            }
            return json_encode($lecLabsArr);
        }elseif($request->type == 'faculty'){
            $cy = request('cy');

            $sem = request('sem');

            $faculty = request('emp_id');

            if ($faculty == 'all' ) {
                if(Auth::user()->designation == 1){
                    $dept_id = Auth::user()->dept_id;
                    $employees = \App\EmpInfo::where('dept_id', $dept_id)->where('position_nature_id', 1)->get();
                }elseif(Auth::user()->designation == 2){
                    $employees = \App\EmpInfo::where('unit_id', Auth::user()->department->unit_id)->where('position_nature_id', 1)->get();
                }else{
                    $employees = \App\EmpInfo::where('position_nature_id', 1)->get();
                }
            }else{
                $employees = \App\EmpInfo::where('pi_number', $faculty)->where('position_nature_id', 1)->get();
            }
            foreach ($employees as $employee) {
                $faculty = $employee->personnelInfo;

                $lecLabs = \App\LecLab::where('emp_id', $faculty->id)->whereHas('sched', function($q) use($cy, $sem){
                    $q->where("cy_id", $cy)->where("sem", $sem);
                })->get();

                if(count($lecLabs) > 0){
                    foreach ($lecLabs as $lecLab) {
                        $lecLab['course'] = $lecLab->course;
                        $lecLab['bldg'] = $lecLab->bldg;
                        $lecLab['room'] = $lecLab->room;
                        $lecLab['day'] = explode("-", $lecLab->day);
                        $lecLab['faculty'] = $lecLab->faculty;
                    }
                    $lecLabsArr[$faculty->id] = array();
                    $lecLabsArr[$faculty->id] = $lecLabs;
                }
            }
            return json_encode($lecLabsArr);
        }elseif($request->type == 'section'){
            $raw = "";

            $year = request('year');

            if($year != 'all'){
                $raw = "year = ". $year;
                $sem = request('sem');
                if($sem != 'all'){
                    $raw .= " AND sem = " . $sem;
                }
            }else{
                $sem = request('sem');
                if($sem != 'all'){
                    $raw .= "sem = " . $sem;
                }
            }

            if ($raw == "") {
                $schedules = \App\Schedules::where('user_id', Auth::user()->id)->where('cy_id', request('cy'))->get();
            }else{
                $schedules = \App\Schedules::whereRaw($raw)->where('cy_id', request('cy'))->get();
            }

            foreach($schedules as $schedule){
                $lecLabs = $schedule->lecLabs;
                if(count($lecLabs) > 0){
                    foreach ($lecLabs as $lecLab) {
                        $lecLab['course'] = $lecLab->course;
                        $lecLab['bldg'] = $lecLab->bldg;
                        $lecLab['room'] = $lecLab->room;
                        $lecLab['day'] = explode("-", $lecLab->day);
                        $lecLab['faculty'] = $lecLab->faculty;
                    }
                    $lecLabsArr[$schedule->id] = array();
                    $lecLabsArr[$schedule->id] = $lecLabs;
                }
            }
            return json_encode($lecLabsArr);
        }elseif($request->type == '1b1'){
            $schedule = Schedules::where('id', request('schedule_id'))->first();
            $lecLabs = $schedule->lecLabs;
            if(count($lecLabs) > 0){
                foreach ($lecLabs as $lecLab) {
                    $lecLab['course'] = $lecLab->course;
                    $lecLab['bldg'] = $lecLab->bldg;
                    $lecLab['room'] = $lecLab->room;
                    $lecLab['day'] = explode("-", $lecLab->day);
                    $lecLab['faculty'] = $lecLab->faculty;
                }
                $lecLabsArr[$schedule->id] = array();
                $lecLabsArr[$schedule->id] = $lecLabs;
            }
            return json_encode($lecLabsArr);
        }elseif($request->type == 'create'){
            $year = request('year');

            $sem = request('sem');

            $curricula_id = request('curricula_id');

            $curricula = Curricula::where('id', $curricula_id)->first();

            $curriculaYss = $curricula->curriculaYss()->where('year',$year)->where('sem',$sem)->get();

            $courseIds = array();

            $courseIdsWLab = array();

            foreach($curriculaYss as $curriculaYs){
                $curriculaDetails = $curriculaYs->curriculaDetails;
                foreach ($curriculaDetails as $curriculaDetail){

                    if($curriculaDetail->course->lab_unit > 0){
                        $courseIdsWLab[] = $curriculaDetail->course->id;
                    }

                    $courseIds[] = $curriculaDetail->course->id;
                }
            }


            for ($i = 0; $i < count($courseIds); $i++) {
                $sched[$courseIds[$i]] = $request->input("$courseIds[$i]");
                $sched[$courseIds[$i]]['course'] = Courses::where('id', $courseIds[$i])->first()->toArray();
                foreach ($sched[$courseIds[$i]] as $outer => $value) {
                    if (is_int($outer)) {
                        $faculty = $sched[$courseIds[$i]][$outer]['lec_fac'];
                        if ($faculty != 'TBA') {
                            $faculty = Pi1::where('id', $faculty)->first();
                        }

                        $bldg = $sched[$courseIds[$i]][$outer]['lec_bldg'];

                        if ($bldg != NULL && $bldg != 'TBA') {
                            $bldg = Bldg::where('id', $bldg)->first();
                        }

                        $room = $sched[$courseIds[$i]][$outer]['lec_room'];

                        if (isset($room)) {
                            if ($room != 'TBA' && $room != NULL) {
                                $room = Rooms::where('id', $room)->first();
                            }
                        }

                        $lecLab = array(
                            'course' => $sched[$courseIds[$i]]['course'],
                            'fr_id' => $sched[$courseIds[$i]][$outer]['lec_fr'],
                            'to_id' => $sched[$courseIds[$i]][$outer]['lec_to'],
                            'day' => $sched[$courseIds[$i]][$outer]['lec_day'],
                            'faculty' => $faculty,
                            'bldg' => $bldg,
                            'room' => $room,
                            'type' => 'Lec'
                        );
                        array_push($lecLabsArr, $lecLab);
                    }
                }
            }
            for ($i = 0; $i < count($courseIdsWLab); $i++) {
                $sched[$courseIdsWLab[$i] . "-lab"] = $request->input("$courseIdsWLab[$i]-lab");
                foreach ($sched[$courseIdsWLab[$i] . "-lab"] as $outer => $value) {
                    $faculty = $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_fac'];
                    if ($faculty != 'TBA') {
                        $faculty = Pi1::where('id', $faculty)->first();
                    }

                    $bldg = $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_bldg'];

                    if ($bldg != NULL && $bldg != 'TBA') {
                        $bldg = Bldg::where('id', $bldg)->first();
                    }

                    $room = $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_room'];

                    if (isset($room)) {
                        if ($room != 'TBA' && $room != NULL) {
                            $room = Rooms::where('id', $room)->first();
                        }
                    }

                    $lecLab = array(
                        'course' => $sched[$courseIdsWLab[$i]]['course'],
                        'fr_id' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_fr'],
                        'to_id' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_to'],
                        'day' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_day'],
                        'faculty' => $faculty,
                        'bldg' => $bldg,
                        'room' => $room,
                        'type' => 'Lab'
                    );
                    array_push($lecLabsArr, $lecLab);
                }
            }
            return json_encode($lecLabsArr);
        }

    }

    public function getEditPending(Request $request)
    {
        $schedule = Schedules::where('id', request('schedule_id'))->first();

        $lecLabs = $schedule->lecLabs()->orderBy('course_id')->get();

        $curricula = Curricula::where('id', $schedule->curricula_id)->first();

        $curriculaYss = $curricula->curriculaYss()->where('year',$schedule->year)->where('sem',$schedule->sem)->get();

        $sched = array();

        foreach ($lecLabs as $lecLab) {
            if ($lecLab->type == 1) {
                $sched[$lecLab->course_id][0]['lec_day'] = explode("-", $lecLab->day);
                $sched[$lecLab->course_id][0]['lec_bldg'] = $lecLab->bldg_id;
                $sched[$lecLab->course_id][0]['lec_room'] = $lecLab->room_id;
                $sched[$lecLab->course_id][0]['lec_fr'] = $lecLab->fr_id;
                $sched[$lecLab->course_id][0]['lec_to'] = $lecLab->to_id;
                $sched[$lecLab->course_id][0]['lec_dept'] = $lecLab->dept_id;
                $sched[$lecLab->course_id][0]['lec_type'] = $lecLab->course_type;
                $lecfac = "";
                ($lecLab->emp_id == 0 ? $lecfac = "TBA" : $lecfac =  $lecLab->emp_id);
                $sched[$lecLab->course_id][0]['lec_fac'] = $lecfac;
                $sched[$lecLab->course_id]['course'] = Courses::where('id',$lecLab->course_id)->first();

                if(count( pending_ge::where('schedule_id' , $schedule->id)->where('user_id', Auth::user()->dept_id)->where('course_id', $lecLab->course_id)->get() ) > 0){
                    $sched[$lecLab->course_id][0]['pending'] = true;
                }
            }
            elseif ($lecLab->type == 2) {
                //$count_lab = count(LecLab::where('schedule_id', $schedule->id)->where('course_id', $lecLab->course_id)->where('type', 2)->get());
                $sched[$lecLab->course_id . "-lab"][0]['lab_day'] = explode("-", $lecLab->day);
                $sched[$lecLab->course_id . "-lab"][0]['lab_bldg'] = $lecLab->bldg_id;
                $sched[$lecLab->course_id . "-lab"][0]['lab_room'] = $lecLab->room_id;
                $sched[$lecLab->course_id . "-lab"][0]['lab_fr'] = $lecLab->fr_id;
                $sched[$lecLab->course_id . "-lab"][0]['lab_to'] = $lecLab->to_id;
                $sched[$lecLab->course_id . "-lab"][0]['lab_type'] = $lecLab->course_type;
                $labfac = "";
                ($lecLab->emp_id == 0 ? $labfac = "TBA" : $labfac =  $lecLab->emp_id);
                $sched[$lecLab->course_id . "-lab"][0]['lab_fac'] = $labfac;

                if(count( pending_ge::where('schedule_id' , $schedule->id)->where('user_id', Auth::user()->id)->where('course_id', $lecLab->course_id)->get() ) > 0){
                    $sched[$lecLab->course_id . "-lab"][0]['pending'] = true;
                }
            }
        }

        $courseIds = array();

        foreach($curriculaYss as $curriculaYs){
            $curriculaDetails = $curriculaYs->curriculaDetails;
            foreach ($curriculaDetails as $curriculaDetail){
                $courseIds[] = $curriculaDetail->course->id;
            }
        }

        $timeCodes = TimeCodes::all();
        $teachingFaculties = PositionNatures::first()->empInfo;
        $bldgs = Bldg::all();
        $edit = true;
        $pending = true;
        return view("schedules.generatedSchedule", compact(["sched", "courseIds", "request", "timeCodes", "teachingFaculties", "bldgs", "edit", "pending"]));
    }

    public function pending_ge(Request $request){
        $degreeID = Auth::user()->degree_id;

        $curriculas = Curricula::where('degree_id', $degreeID)->get();

        $cys = Cys::orderBy('cy', 'DESC')->get();

        return view('schedules.pending_ge', compact(['curriculas','cys']));
    }

    public function generateSchedule(Request $request)
    {
        $daysSched = $sched = $courseIds = $timeCodes = $teachingFaculties = $bldgs = $notGenerate = null;

        $lec_cols = array('lec_bldg', 'lec_room', 'lec_fr', 'lec_to', 'lec_day', 'lec_fac');

        $lab_cols = array('lab_bldg', 'lab_room', 'lab_fr', 'lab_to', 'lab_day', 'lab_fac');

        $year = request('year');

        $sem = request('sem');

        $size = request('size');

        $bldgs = request('bldgs');

        $bldgs_lab = request('bldgs_lab');

        $rooms = request('rooms');

        $rooms_lab = request('rooms_lab');

        $curricula_id = request('curricula_id');

        $curricula = Curricula::where('id', $curricula_id)->first();

        $curriculaYss = $curricula->curriculaYss()->where('year',$year)->where('sem',$sem)->get();

        $courseIds = array();

        $courseIdsWLab = array();

        $allBldgs = Bldg::all();

        $college = $curricula->degree->college;

        foreach ($allBldgs as $allBldg) {
            if(in_array($allBldg["id"], $bldgs)){
                //continue;
                dd($bldgs);
            }else {
                array_push($bldgs, $allBldg["id"]);
            }
        }

        foreach ($allBldgs as $allBldg) {
            if(in_array($allBldg["id"], $bldgs_lab)){
                continue;
            }else {
                array_push($bldgs_lab, $allBldg["id"]);
            }
        }

        $allRooms = Rooms::select("id")->where("room_type_id", 1)->where("bldg_id",current($bldgs))->get();

        $tempRooms = $rooms;

        $rooms = array();

        foreach ($tempRooms as $tempRoom) {
            if($allRooms->contains('id', $tempRoom)){
                array_push($rooms, $tempRoom);
            }
        }

        foreach ($allRooms as $allRoom) {
            if(in_array($allRoom["id"], $rooms)){
                continue;
            }else{
                array_push($rooms, $allRoom["id"]);
            }
        }

        foreach($curriculaYss as $curriculaYs){
            $curriculaDetails = $curriculaYs->curriculaDetails;
            foreach ($curriculaDetails as $curriculaDetail){

                if($curriculaDetail->course->lab_unit > 0){
                    $courseIdsWLab[] = $curriculaDetail->course->id;
                }

                $courseIds[] = $curriculaDetail->course->id;
            }
        }

        $daysSched = array();

        $daysSched["M"] = array();
        $daysSched["T"] = array();
        $daysSched["W"] = array();
        $daysSched["Th"] = array();
        $daysSched["F"] = array();

        $sched = array();

        for ($i = 0; $i < count($courseIdsWLab); $i++) {
            $sched[$courseIdsWLab[$i] . "-lab"] = $request->input("$courseIdsWLab[$i]-lab");
            //$sched[$courseIdsWLab[$i]]['course'] = Courses::where('id', $courseIdsWLab[$i])->first()["attributes"];
        }

        for ($i = 0; $i < count($courseIds); $i++) {
            $sched[$courseIds[$i]] = $request->input("$courseIds[$i]");
            $sched[$courseIds[$i]]['course'] = Courses::where('id', $courseIds[$i])->first()->toArray();
        }


        $notGenerate = false;
        for ($i = 0; $i < count($courseIdsWLab); $i++) {
            foreach($sched[$courseIdsWLab[$i] . "-lab"] as $outer => $value) {
                if (!isset($sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_day"])) {
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_day"] = array();
                }
                if (!isset($sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_generate'])) {

                    $notGenerate = true;

                    if (!empty($sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_day']) &&
                        is_numeric((int)$sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_fr']) &&
                        is_numeric((int)$sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_to']) )
                    {
                        if (((int)$sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_fr']) != 0 &&
                            ((int)$sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_to']) != 0) {
                            $from = (int)$sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_fr'];
                            $to = (int)$sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_to'];
                            $ds = $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_day'];
                            foreach ($ds as $d) {
                                array_push($daysSched[$d], array("from" => $from, "to" => $to, "code" => $sched[$courseIdsWLab[$i]]['course']['code'], "course" => $sched[$courseIdsWLab[$i]]['course']['id'], "type" => "lab"));
                            }
                        }
                    }
                    if (!isset($sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_room'])) {
                        $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_room'] = NULL;
                    }
                }
            }
        }



        for ($i = 0; $i < count($courseIds); $i++) {
            foreach($sched[$courseIds[$i]] as $outer => $value) {
                if (!is_int($outer)) {
                    continue;
                }
                if (!isset($sched[$courseIds[$i]][$outer]["lec_day"])) {
                    $sched[$courseIds[$i]][$outer]["lec_day"] = array();
                }
                if (!isset($sched[$courseIds[$i]][$outer]['lec_generate'])) {

                    $notGenerate = true;

                    if (!empty($sched[$courseIds[$i]][$outer]['lec_day']) &&
                        is_numeric((int)$sched[$courseIds[$i]][$outer]['lec_fr']) &&
                        is_numeric((int)$sched[$courseIds[$i]][$outer]['lec_to']) )
                    {
                        if (((int)$sched[$courseIds[$i]][$outer]['lec_fr']) != 0 && ((int)$sched[$courseIds[$i]][$outer]['lec_to']) != 0) {
                            $from = (int)$sched[$courseIds[$i]][$outer]['lec_fr'];
                            $to = (int)$sched[$courseIds[$i]][$outer]['lec_to'];
                            $ds = $sched[$courseIds[$i]][$outer]['lec_day'];

                            foreach ($ds as $d) {
                                array_push($daysSched[$d], array("from" => $from, "to" => $to, "code" => $sched[$courseIds[$i]]['course']['code'], "course" => $sched[$courseIds[$i]]['course']['id'], "type" => "lec"));
                            }
                        }
                    }
                    if (!isset($sched[$courseIds[$i]][$outer]['lec_room'])) {
                        $sched[$courseIds[$i]][$outer]['lec_room'] = NULL;
                    }
                }
            }
        }

        $days = array();

        $days[3] = array(
            array("M", "W", "F"),
            array("T", "Th"),
            array("M", "W"),
            array("W", "F"),
        );

        $days[2] = array(
            array("T", "Th"),
            array("M", "W"),
            array("W", "F"),
            array('M'),
            array('T'),
            array('W'),
            array('Th'),
            array('F'),
        );

        $days[1] = array(
            array('M'),
            array('T'),
            array('W'),
            array('Th'),
            array('F'),
        );

        $days_lab[3] = array(
            array("M", "W", "F"),
        );

        $days_lab[2] = array(
            array("T", "Th"),
            array("M", "W"),
            array("W", "F"),
        );

        $days_lab[1] = array(
            array('M'),
            array('T'),
            array('W'),
            array('Th'),
            array('F'),
        );

        $labHours = array(
            3, 9, 15
        );
        shuffle($days[3]);
        shuffle($days[2]);
        shuffle($days[1]);
        shuffle($days_lab[2]);
        shuffle($days_lab[1]);
        shuffle($labHours);
        $bldgsSched = array();

        $allTime = range(3,21);

        $current_month = date("m");
        $current_year = date("Y");
        if($current_month > 2){
               $SY = $current_year . '-' . ($current_year + 1);
        }else if($current_month < 6)
               $SY = ($current_year - 1) . '-' . $current_year;


        $cysObj = Cys::where("cy", $SY)->first();

        if (empty($cysObj)) {
            $cysObj = Cys::create([
                "cy" => $SY
            ]);
        }

// Placement for lab
//  _         _
// | |   __ _| |__
// | |__/ _` | '_ \
// |____\__,_|_.__/

        $noTimeLab = false;


        for ($i = 0; $i < count($courseIdsWLab); $i++){

            foreach($sched[$courseIdsWLab[$i] . "-lab"] as $outer => $value) {
                    shuffle($days_lab[2]);
                    shuffle($days_lab[1]);
                    shuffle($labHours);
                    if (!isset($sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_generate'])) {
                        continue;
                    }

                    $repeat = false;
                    reset($bldgs_lab);
                    do {
                        $allRoomsLab = Rooms::select("id")->where("room_type_id", $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_type'])->where("bldg_id",current($bldgs_lab))->get();

                        $tempRoomsLab = $rooms_lab;

                        $rooms_lab = array();

                        foreach ($tempRoomsLab as $tempRoomLab) {
                            if($allRoomsLab->contains('id', $tempRoomLab)){
                                array_push($rooms_lab, $tempRoomLab);
                            }
                        }

                        foreach ($allRoomsLab as $allRoomLab) {
                            if(in_array($allRoomLab["id"], $rooms_lab)){
                                continue;
                            }else{
                                array_push($rooms_lab, $allRoomLab["id"]);
                            }
                        }

                        if (empty($rooms_lab)) {

                            next($bldgs_lab);
                        }

                        if (!$allRoomsLab->isEmpty()) {
                            break;
                        }

                    } while (next($bldgs_lab) != false);


                    do{
                        $bldg_lab = Bldg::where('id',current($bldgs_lab))->first();

                        $room_lab = Rooms::where('id', current($rooms_lab))->first();

                        $lab_hours = $sched[$courseIdsWLab[$i]]['course']['lab_unit'] * 3;

                        $sessions = ceil( $size/$room_lab->capacity) *  $sched[$courseIdsWLab[$i]]["course"]["lab_unit"];

                        if($sessions >= 3){
                            $ds = current($days_lab[3]);
                        }else{
                            $ds = current($days_lab[$sessions]);
                        }

                        $availableTime = array();
                        $availableTime_room = array();

                        foreach ($ds as $day) {

                            $availableTime[$day] = array();

                            foreach($daysSched[$day] as $time){
                                $availableTime[$day] = array_unique(array_merge($availableTime[$day], range($time["from"]+1, $time["to"]-1)), SORT_NUMERIC );
                            }

                            $availableTime[$day] = array_diff($allTime, $availableTime[$day]);
                        }

                        $room = $room_lab['id'];
                        $availableTime_room[$room] = array();

                        foreach ($ds as $day) {
                            $schedules = LecLab::where('room_id', $room)->where('day', 'like', "%". $day ."%")->whereHas('sched', function($q) use($cysObj, $sem){
                                $q->where("cy_id", $cysObj->id)->where("sem", $sem);
                            })->get();

                            $availableTime_room[$room][$day] = array();
                            foreach ($schedules as $schedule) {
                                $availableTime_room[$room][$day] = array_unique(array_merge($availableTime_room[$room][$day], range($schedule["fr_id"]+1, $schedule["to_id"]-1)), SORT_NUMERIC );
                            }
                            $availableTime[$day] = array_diff($availableTime[$day], $availableTime_room[$room][$day]);
                        }

                        $availableTimeFac = array();

                        if ($sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_fac'] != "TBA") {
                            foreach ($ds as $day) {
                                $availableTimeFac[$day] = array();

                                $schedules = LecLab::where('emp_id', $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_fac'])->where('day', 'like', "%". $day ."%")->whereHas('sched', function($q) use($cysObj, $sem){
                                    $q->where("cy_id", $cysObj->id)->where("sem", $sem);
                                })->get();

                                foreach ($schedules as $schedule) {
                                    $availableTimeFac[$day] = array_unique(array_merge($availableTimeFac[$day], range($schedule["fr_id"]+1, $schedule["to_id"]-1)), SORT_NUMERIC );
                                }
                                $availableTime[$day] = array_diff($availableTime[$day], $availableTimeFac[$day]);
                            }
                        }

                        do {
                            $time = current($labHours);

                            $from = $time;

                            $to = $time + ($lab_hours * 2);

                            $range = range($from, $to);

                            foreach ($ds as $d) {
                                if ( count(array_intersect($range, $availableTime[$d])) == count($range)) {
                                    $repeat = false;
                                }else{
                                    $repeat = true;
                                    $time = next($labHours);
                                    break;
                                }
                            }

                            if (!$repeat) {
                                break;
                            }

                        } while (current($labHours) != false);

                        reset($labHours);

                        if($repeat){
                            $nextRoom = false;
                            $nextBldg = false;
                            if ($sessions >= 2) {

                                if ($sessions % 3 == 0) {

                                    if(next($days_lab[3]) != false){
                                        $ds = current($days_lab[3]);
                                    }else{
                                        $nextRoom = true;
                                    }

                                }else {

                                    if(next($days_lab[2]) != false){
                                        $ds = current($days_lab[2]);
                                    }else{
                                        $nextRoom = true;
                                    }

                                }
                            }else{
                                if(next($days_lab[1]) != false){
                                    $ds = current($days_lab[1]);
                                }else{
                                    $nextRoom = true;
                                }

                            }

                            if ($nextRoom) {
                                reset($days_lab[1]);
                                reset($days_lab[2]);
                                reset($days_lab[3]);

                                if (next($rooms_lab) != false) {
                                    var_dump(current($rooms_lab));
                                    if ($sessions >= 2) {
                                        if ($sessions % 3 == 0) {
                                            if(next($days_lab[3]) != false){
                                                $ds = current($days_lab[3]);
                                            }
                                        }else {
                                            if(next($days_lab[2]) != false){
                                                $ds = current($days_lab[2]);
                                            }
                                        }
                                    }else{
                                        if(next($days_lab[1]) != false){
                                            $ds = current($days_lab[1]);
                                        }
                                    }
                                }else{
                                    $nextBldg = true;
                                }
                            }

                            if ($nextBldg) {
                                reset($rooms_lab);
                                if(next($bldgs_lab) != false){
                                    var_dump(current($bldgs_lab));
                                    $allRoomsLab = Rooms::select("id")->where("room_type_id", $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_type'])->where("bldg_id",current($bldgs_lab))->get();

                                    $tempRoomsLab = $rooms_lab;

                                    $rooms_lab = array();

                                    foreach ($tempRoomsLab as $tempRoomLab) {
                                        if($allRoomsLab->contains('id', $tempRoomLab)){
                                            array_push($rooms_lab, $tempRoomLab);
                                        }
                                    }

                                    foreach ($allRoomsLab as $allRoomLab) {
                                        if(in_array($allRoomLab["id"], $rooms_lab)){
                                            continue;
                                        }else{
                                            array_push($rooms_lab, $allRoomLab["id"]);
                                        }
                                    }
                                }else{
                                    $noTimeLab = true;
                                    break;
                                }

                            }
                        }

                    }while( $repeat );
                    reset($bldgs_lab);
                    reset($rooms_lab);
                    if($noTimeLab){
                        $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_bldg'] = "TBA";
                        $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_room'] = "TBA";
                        $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_day'] = array("TBA");
                        $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_fr'] = "TBA";
                        $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_to'] = "TBA";
                        break;
                    }
                    foreach ($ds as $d) {
                        array_push($daysSched[$d], array("from" => $from, "to" => $to, "code" => $sched[$courseIdsWLab[$i]]['course']['code'], "course" => $sched[$courseIdsWLab[$i]]['course']['id'], "type" => "lab"));
                    }
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_day'] = $ds;
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_bldg'] = $bldg_lab['id'];
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_room'] = $room_lab['id'];
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_fr'] = $from;
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]['lab_to'] = $to;
            }

        }
// Placement for vacants
// __   __                _
// \ \ / /_ _ __ __ _ _ _| |_
//  \ V / _` / _/ _` | ' \  _|
//   \_/\__,_\__\__,_|_||_\__|

        $morning = array();
        $afternoon = array();
        //initializing time codes for morning and afternoon
        foreach (TimeCodes::select('id')->where('id', '>=', 5)->where('id', '<=', 8)->get() as $value) {
            array_push($morning, $value['id']);
        }

        foreach (TimeCodes::select('id')->where('id', '>=', 15)->where('id', '<=', 19)->get() as $value) {
            array_push($afternoon, $value['id']);
        }

        // assigning lunch break

        $availableTime = array();



        foreach ($days[1] as $day) {
            $availableTime[$day[0]] = array();

            foreach($daysSched[$day[0]] as $time){
                $availableTime[$day[0]] = array_unique(array_merge($availableTime[$day[0]], range($time["from"]+1, $time["to"]-1)), SORT_NUMERIC );
            }
            $availableTime[$day[0]] = array_diff($allTime, $availableTime[$day[0]]);
        }



        foreach ($days[1] as $day) {

            $lunch = array("from" => 11, "to" => 13);

            $range = range($lunch["from"], $lunch["to"]);

            if ( count(array_intersect($range, $availableTime[$day[0]])) == count($range)) {
                array_push($daysSched[$day[0]], array("from" => $lunch["from"], "to" => $lunch["to"], "code" => "lunch", "course" => "lunch", "type" => "vacant"));
            }
        }

        // assigning snacks for morning
/* COMMENT START */
        $mwf = array("M", "W", "F");
        $tth = array("T", "Th");

        foreach ($mwf as $day) {
            $availableTime[$day] = array();

            foreach($daysSched[$day] as $time){
                $availableTime[$day] = array_unique(array_merge($availableTime[$day], range($time["from"]+1, $time["to"]-1)), SORT_NUMERIC );
            }

            $availableTime[$day] = array_diff($allTime, $availableTime[$day]);
        }



        foreach ($mwf as $day) {
            $vacant = array();

            $repeat = false;
            do{
                $vacant["from"] = current($morning);

                if($vacant["from"] % 2 == 0){
                    $vacant["to"] = $vacant['from'] + 1;
                }else{
                    $vacant["to"] = $vacant['from'] + 2;
                }

                $range = range($vacant["from"], $vacant["to"]);

                if ( count(array_intersect($range, $availableTime[$day])) == count($range)) {
                    $repeat = false;
                }else{
                    next($morning);
                    if ($morning == false) {
                        $repeat = false;
                        break;
                    }
                    $repeat = true;
                    break;
                }

            }while($repeat);

            array_push($daysSched[$day], array("from" => $vacant["from"], "to" => $vacant["to"], "course" => "snack morning", "type" => "vacant"));

            // $repeat = false;
            // do{
            //     $vacant["from"] = $afternoon[array_rand($afternoon)];

            //     if($vacant["from"] % 2 == 0){
            //         $vacant["to"] = $vacant['from'] + 1;
            //     }else{
            //         $vacant["to"] = $vacant['from'] + 2;
            //     }

            //     $range = range($vacant["from"], $vacant["to"]);

            //     if ( count(array_intersect($range, $availableTime[$day])) == count($range)) {
            //         $repeat = false;
            //     }else{
            //         $repeat = true;
            //         break;
            //     }

            // }while($repeat);

            // array_push($daysSched[$day], array("from" => $vacant["from"], "to" => $vacant["to"], "course" => "snack afternoon", "type" => "vacant"));
        }

        foreach ($tth as $day) {
            $vacant = array();

            $repeat = false;
            do{
                $vacant["from"] = current($morning);

                if($vacant["from"] % 2 == 0){
                    $vacant["to"] = $vacant['from'] + 1;
                }else{
                    $vacant["to"] = $vacant['from'] + 2;
                }

                $range = range($vacant["from"], $vacant["to"]);

                if ( count(array_intersect($range, $availableTime[$day])) == count($range)) {
                    $repeat = false;
                }else{
                    next($morning);
                    if ($morning == false) {
                        $repeat = false;
                        break;
                    }
                    $repeat = true;
                    break;
                }

            }while($repeat);

            array_push($daysSched[$day], array("from" => $vacant["from"], "to" => $vacant["to"], "course" => "snack morning", "type" => "vacant"));

            // $vacant = array();

            // $repeat = false;
            // do{
            //     $vacant["from"] = $afternoon[array_rand($afternoon)];

            //     if($vacant["from"] % 2 == 0){
            //         $vacant["to"] = $vacant['from'] + 1;
            //     }else{
            //         $vacant["to"] = $vacant['from'] + 2;
            //     }

            //     $range = range($vacant["from"], $vacant["to"]);

            //     if ( count(array_intersect($range, $availableTime[$day])) == count($range)) {
            //         $repeat = false;
            //     }else{
            //         $repeat = true;
            //         break;
            //     }
            // }while($repeat);
            // array_push($daysSched[$day], array("from" => $vacant["from"], "to" => $vacant["to"], "course" => "snack afternoon", "type" => "vacant"));
        }
/* COMMENT END */
 // lecture
 //  _           _
 // | |   ___ __| |_ _  _ _ _ ___
 // | |__/ -_) _|  _| || | '_/ -_)
 // |____\___\__|\__|\_,_|_| \___|
        //dd(array_unique(array_merge(array(), range(9,11)), SORT_REGULAR));

        $range = range(0,2);

        foreach ($days[1] as $day) {
            $availableTime[$day[0]] = array();

            foreach($daysSched[$day[0]] as $time){
                $availableTime[$day[0]] = array_unique(array_merge($availableTime[$day[0]], range($time["from"]+1, $time["to"]-1)), SORT_NUMERIC );
            }

            $availableTime[$day[0]] = array_diff($allTime, $availableTime[$day[0]]);
        }

        $noTime = false;

        $tbaCourseTypes = array(13,14);

        for ($i = 0; $i < count($courseIds); $i++){

            foreach($sched[$courseIds[$i]] as $outer => $value) {
                if (!is_int($outer)) {
                    continue;
                }
                if ($sched[$courseIds[$i]]['course']['course_type_id'] == 13) {

                    $sched[$courseIds[$i]][$outer]['lec_bldg'] = "TBA";
                    $sched[$courseIds[$i]][$outer]['lec_room'] = "TBA";
                    $sched[$courseIds[$i]][$outer]['lec_day'] = array("TBA");
                    $sched[$courseIds[$i]][$outer]['lec_fr'] = "TBA";
                    $sched[$courseIds[$i]][$outer]['lec_to'] = "TBA";
                    continue;
                }

                    if (!isset($sched[$courseIds[$i]][$outer]['lec_generate'])) {
                        continue;
                    }

                    $repeat = false;

                    $lec_hours = $sched[$courseIds[$i]]['course']['lecture_units'] * 1;
                    // if ($sched[$courseIds[$i]][$outer]['lec_fac'] != "TBA") {
                    //     var_dump($courseIds[$i]);
                    //     var_dump($sched[$courseIds[$i]][$outer]['lec_fac']);
                    // }
                    do{

                        $bldg_lec = Bldg::where('id',current($bldgs))->first();

                        $room_lec = Rooms::where('id', current($rooms))->first();

                        if($lec_hours >= 2){
                            if ($lec_hours % 3 == 0) {
                                $ds = current($days[3]);
                            }else {
                                $ds = current($days[2]);
                            }
                        }else{
                            $ds = current($days[1]);
                        }

                        $hours = $lec_hours / count($ds);

                        $availableTime = array();
                        $availableTime_room = array();

                        foreach ($ds as $d) {

                            $availableTime[$d] = array();

                            foreach($daysSched[$d] as $time){

                                $availableTime[$d] = array_unique(array_merge($availableTime[$d], range($time["from"]+1, $time["to"] - 1)), SORT_NUMERIC );
                            }

                            $availableTime[$d] = array_diff($allTime, $availableTime[$d]);
                        }

                        $room = $room_lec['id'];

                        $availableTime_room[$room] = array();

                        // if($sched[$courseIds[$i]][$outer]['lec_fac'] == "TBA"){
                        //     var_dump(current($rooms));
                        // }

                        if ($sched[$courseIds[$i]][$outer]['lec_fac'] != "TBA") {
                            $availableTimeFac = array();
                            foreach ($ds as $day) {
                                $availableTimeFac[$day] = array();

                                $schedules = LecLab::where('emp_id', $sched[$courseIds[$i]][$outer]['lec_fac'])->where('day', 'like', "%". $day ."%")->whereHas('sched', function($q) use($cysObj, $sem){
                                    $q->where("cy_id", $cysObj->id)->where("sem", $sem);
                                })->get();

                                foreach ($schedules as $schedule) {
                                    $availableTimeFac[$day] = array_unique(array_merge($availableTimeFac[$day], range($schedule["fr_id"]+1, $schedule["to_id"]-1)), SORT_NUMERIC );
                                }
                                $availableTime[$day] = array_diff($availableTime[$day], $availableTimeFac[$day]);
                            }
                        }

                        foreach ($ds as $d) {

                            $schedules = LecLab::where('room_id', $room)->where('day', 'like', "%". $d ."%")->whereHas('sched', function($q) use($cysObj, $sem){
                                $q->where("cy_id", $cysObj->id)->where("sem", $sem);
                            })->get();

                            $availableTime_room[$room][$d] = array();
                            foreach ($schedules as $schedule) {
                                $availableTime_room[$room][$d] = array_unique(array_merge($availableTime_room[$room][$d], range($schedule["fr_id"]+1, $schedule["to_id"]-1)), SORT_NUMERIC );
                            }

                            $availableTime[$d] = array_diff($availableTime[$d], $availableTime_room[$room][$d]);
                        }


                        // if(current($availableTime[$ds[0]]) == 2){
                        //     if(array_rand(range(0, 1)) == 1){
                        //         next($availableTime[$ds[0]]);
                        //     }
                        // }

                        do {
                            $time = current($availableTime[$ds[0]]);

                            $from = $time;
                            $to = $from + ($hours * 2);
                            $range = range($from,$to);

                            foreach ($ds as $d) {

                                if ( count(array_intersect($range, $availableTime[$d])) == count($range)) {
                                    $repeat = false;
                                }else{
                                    $repeat = true;
                                    $time = next($availableTime[$ds[0]]);
                                    break;
                                }
                            }

                            if($repeat == false){
                                break;
                            }

                        } while (current($availableTime[$ds[0]]) != false);

                        reset($availableTime);

                        if ($repeat) {
                            $nextRoom = false;
                            $nextBldg = false;
                            if ($lec_hours >= 2) {

                                if ($lec_hours % 3 == 0) {

                                    if(next($days[3]) != false){
                                        $ds = current($days[3]);
                                    }else{
                                        $nextRoom = true;
                                    }

                                }else {

                                    if(next($days[2]) != false){
                                        $ds = current($days[2]);
                                    }else{
                                        $nextRoom = true;
                                    }

                                }
                            }else{
                                if(next($days[1]) != false){
                                    $ds = current($days[1]);
                                }else{
                                    $nextRoom = true;
                                }

                            }

                            if ($nextRoom) {
                                reset($days[1]);
                                reset($days[2]);
                                reset($days[3]);
                                if (next($rooms) != false) {
                                    if ($lec_hours >= 2) {
                                        if ($lec_hours % 3 == 0) {

                                            if(next($days[3]) != false){
                                                $ds = current($days[3]);
                                            }
                                        }else {

                                            if(next($days[2]) != false){
                                                $ds = current($days[2]);
                                            }
                                        }
                                    }else{
                                        if(next($days[1]) != false){
                                            $ds = current($days[1]);
                                        }
                                    }
                                }else{
                                    $nextBldg = true;
                                }
                            }

                            if ($nextBldg) {
                                reset($rooms);
                                if(next($bldgs) != false){
                                    $allRooms = Rooms::select("id")->where("room_type_id", 1)->where("bldg_id",current($bldgs))->get();

                                    $tempRooms = $rooms;

                                    $rooms = array();

                                    foreach ($tempRooms as $tempRoom) {
                                        if($allRooms->contains('id', $tempRoom)){
                                            array_push($rooms, $tempRoom);
                                        }
                                    }

                                    foreach ($allRooms as $allRoom) {
                                        if(in_array($allRoom["id"], $rooms)){
                                            continue;
                                        }else{
                                            array_push($rooms, $allRoom["id"]);
                                        }
                                    }
                                }else{
                                    reset($days[1]);
                                    reset($days[2]);
                                    reset($days[3]);
                                    $noTime = true;
                                    break;
                                }
                            }
                        }
                    }while( $repeat );

                    reset($bldgs);
                    $allRooms = Rooms::select("id")->where("room_type_id", 1)->where("bldg_id",current($bldgs))->get();

                    $tempRooms = $rooms;

                    $rooms = array();

                    foreach ($tempRooms as $tempRoom) {
                        if($allRooms->contains('id', $tempRoom)){
                            array_push($rooms, $tempRoom);
                        }
                    }

                    foreach ($allRooms as $allRoom) {
                        if(in_array($allRoom["id"], $rooms)){
                            continue;
                        }else{
                            array_push($rooms, $allRoom["id"]);
                        }
                    }

                    if($noTime){
                        $sched[$courseIds[$i]][$outer]['lec_bldg'] = "TBA";
                        $sched[$courseIds[$i]][$outer]['lec_room'] = "TBA";
                        $sched[$courseIds[$i]][$outer]['lec_day'] = array("TBA");
                        $sched[$courseIds[$i]][$outer]['lec_fr'] = "TBA";
                        $sched[$courseIds[$i]][$outer]['lec_to'] = "TBA";
                        $noTime = false;
                        continue;
                    }

                    foreach ($ds as $d) {
                        array_push($daysSched[$d], array("from" => $from, "to" => $to, "code" => $sched[$courseIds[$i]]['course']['code'], "course" => $sched[$courseIds[$i]]['course']['id'], "type" => "lec"));
                    }
                    $sched[$courseIds[$i]][$outer]['lec_day'] = $ds;
                    $sched[$courseIds[$i]][$outer]['lec_bldg'] = $bldg_lec['id'];
                    $sched[$courseIds[$i]][$outer]['lec_room'] = $room_lec["id"];
                    $sched[$courseIds[$i]][$outer]['lec_fr'] = $from;
                    $sched[$courseIds[$i]][$outer]['lec_to'] = $to;
            }
        }
        $timeCodes = TimeCodes::all();
        $teachingFaculties = PositionNatures::first()->empInfo;
        $bldgs = Bldg::all();

        return view("schedules.generatedSchedule", compact(["daysSched", "sched", "courseIds", "request", "timeCodes", "teachingFaculties", "bldgs", "notGenerate"]));
    }

    public function checkConflict(Request $request)
    {
        $curricula_id = request('curricula_id');

        $year = request('year');

        $sem = request('sem');

        $curriculas = Curricula::where('id', $curricula_id)->first();

        $curriculaYss = $curriculas->curriculaYss()->where('year',$year)->where('sem',$sem)->get();

        $courseIds = array();

        foreach($curriculaYss as $curriculaYs){
            $curriculaDetails = $curriculaYs->curriculaDetails;
            foreach ($curriculaDetails as $curriculaDetail){
                $courseIds[] = $curriculaDetail->course->id;
            }
        }

        $availableTime = array();

        $availableTime["M"] = range(1,30);
        $availableTime["T"] = range(1,30);
        $availableTime["W"] = range(1,30);
        $availableTime["Th"] = range(1,30);
        $availableTime["F"] = range(1,30);

        //$allTime = range(2,21);

        $sched = array();

        for ($i = 0; $i < count($courseIds); $i++) {


            if(Courses::where('id', $courseIds[$i])->first()->lab_unit > 0){
                $sched[$courseIds[$i] . "-lab"] = $request->input("$courseIds[$i]-lab");
            }
            $sched[$courseIds[$i]] = $request->input("$courseIds[$i]");
            $sched[$courseIds[$i]]['course'] = Courses::where('id', $courseIds[$i])->first();
        }

        $conflicts = array();
        for ($i = 0; $i < count($courseIds); $i++) {
            for ($j = $i; $j < count($courseIds); $j++) {
                $lab_unit_outer = $sched[$courseIds[$i]]['course']['lab_unit'];
                $lab_unit_inner = $sched[$courseIds[$j]]['course']['lab_unit'];

                foreach($sched[$courseIds[$i]] as $outer => $value) {
                    if (!is_int($outer)) {
                        continue;
                    }
                    foreach($sched[$courseIds[$j]] as $inner => $value) {
                        if (!is_int($inner)) {
                            continue;
                        }
                        if (isset($sched[$courseIds[$i]][$outer]['lec_day']) &&  isset($sched[$courseIds[$j]][$inner]['lec_day'])) {
                            foreach ($sched[$courseIds[$i]][$outer]['lec_day'] as $day) {
                                $in_array = false;
                                if (in_array($day , $sched[$courseIds[$j]][$inner]['lec_day'])) {
                                    $in_array = true;
                                    break;
                                }
                            }
                            if ($in_array){
                                if ($sched[$courseIds[$i]][$outer]['lec_fr'] != "TBA" && $sched[$courseIds[$i]][$outer]['lec_to'] != "TBA" && $sched[$courseIds[$j]][$inner]['lec_fr'] != "TBA" && $sched[$courseIds[$j]][$inner]['lec_fr'] != "TBA" ) {
                                    $rangeOuter = range((int)$sched[$courseIds[$i]][$outer]['lec_fr'],(int)$sched[$courseIds[$i]][$outer]['lec_to']);


                                    $rangeInner = range((int)$sched[$courseIds[$j]][$inner]['lec_fr'], (int)$sched[$courseIds[$j]][$inner]['lec_to']);

                                    if (count(array_intersect($rangeOuter, $rangeInner)) > 0  && ($rangeOuter[count($rangeOuter) - 1] != $rangeInner[0] && $rangeInner[count($rangeInner)-1] != $rangeOuter[0])  ) {
                                        if ($courseIds[$i] == $courseIds[$j] && $outer == $inner) {
                                            continue;
                                        }
                                        $self = $sched[$courseIds[$i]]['course']['code'];
                                        $conflict = $sched[$courseIds[$j]]['course']['code'];
                                        array_push($conflicts, array('self' => $self, 'selfType' => 'lec', 'outer' => $outer, 'conflict' => $conflict, 'conflictType' => 'lec', 'inner' => $inner));
                                    }
                                }
                            }

                        }
                    }

                    if ($lab_unit_inner > 0) {
                        foreach($sched[$courseIds[$j] . "-lab"] as $inner => $value) {
                            if (isset($sched[$courseIds[$i]][$outer]['lec_day']) &&  isset($sched[$courseIds[$j] . "-lab"][$inner]['lab_day'])) {

                                foreach ($sched[$courseIds[$i]][$outer]['lec_day'] as $day) {
                                    $in_array = false;
                                    if (in_array($day , $sched[$courseIds[$j] . "-lab"][$inner]['lab_day'])) {
                                        $in_array = true;
                                        break;
                                    }
                                }

                                if ($in_array){
                                    if ($sched[$courseIds[$i]][$outer]['lec_fr'] != "TBA" && $sched[$courseIds[$i]][$outer]['lec_to'] != "TBA" && $sched[$courseIds[$j] . "-lab"][$inner]['lab_fr'] != "TBA" && $sched[$courseIds[$j] . "-lab"][$inner]['lab_fr'] != "TBA" ) {
                                        $rangeOuter = range($sched[$courseIds[$i]][$outer]['lec_fr'],$sched[$courseIds[$i]][$outer]['lec_to']);
                                        $rangeInner = range($sched[$courseIds[$j] . "-lab"][$inner]['lab_fr'], $sched[$courseIds[$j] . "-lab"][$inner]['lab_to']);

                                        if (count(array_intersect($rangeOuter, $rangeInner)) > 0 && ($rangeOuter[count($rangeOuter) - 1] != $rangeInner[0] && $rangeInner[count($rangeInner)-1] != $rangeOuter[0]) ) {
                                            $self = $sched[$courseIds[$i]]['course']['code'];
                                            $conflict = $sched[$courseIds[$j]]['course']['code'];
                                            array_push($conflicts, array('self' => $self, 'selfType' => 'lec', 'outer' => $outer, 'conflict' => $conflict, 'conflictType' => 'lab', 'inner' => $inner));
                                        }
                                    }
                                }

                            }
                        }
                    }
                }
                if ($lab_unit_outer > 0) {
                    foreach($sched[$courseIds[$i] . "-lab"] as $outer => $value) {
                        foreach($sched[$courseIds[$j]] as $inner => $value) {
                            if (!is_int($inner)) {
                                continue;
                            }
                            if (isset($sched[$courseIds[$i] . "-lab"][$outer]['lab_day']) &&  isset($sched[$courseIds[$j]][$inner]['lec_day'])) {
                                foreach ($sched[$courseIds[$i] . "-lab"][$outer]['lab_day'] as $day) {
                                    $in_array = false;
                                    if (in_array($day , $sched[$courseIds[$j]][$inner]['lec_day'])) {
                                        $in_array = true;
                                        break;
                                    }
                                }
                                if ($in_array){
                                    if ($sched[$courseIds[$i] . "-lab"][$outer]['lab_fr'] != "TBA" && $sched[$courseIds[$i] . "-lab"][$outer]['lab_to'] != "TBA" && $sched[$courseIds[$j]][$inner]['lec_fr'] != "TBA" && $sched[$courseIds[$j]][$inner]['lec_fr'] != "TBA" ) {
                                        $rangeOuter = range($sched[$courseIds[$i] . "-lab"][$outer]['lab_fr'],$sched[$courseIds[$i] . "-lab"][$outer]['lab_to']);
                                        $rangeInner = range($sched[$courseIds[$j]][$inner]['lec_fr'], $sched[$courseIds[$j]][$inner]['lec_to']);


                                        if (count(array_intersect($rangeOuter, $rangeInner)) > 0  && ($rangeOuter[count($rangeOuter) - 1] != $rangeInner[0] && $rangeInner[count($rangeInner)-1] != $rangeOuter[0]) ) {
                                            if ($courseIds[$i] == $courseIds[$j] && $outer == $inner) {
                                                continue;
                                            }
                                            $self = $sched[$courseIds[$i]]['course']['code'];
                                            $conflict = $sched[$courseIds[$j]]['course']['code'];
                                            array_push($conflicts, array('self' => $self, 'selfType' => 'lab', 'outer' => $outer, 'conflict' => $conflict, 'conflictType' => 'lec', 'inner' => $inner));
                                        }
                                    }
                                }

                            }
                        }

                        if ($lab_unit_inner > 0) {

                            foreach($sched[$courseIds[$j] . "-lab"] as $inner => $value) {
                                if (isset($sched[$courseIds[$i] . "-lab"][$outer]['lab_day']) &&  isset($sched[$courseIds[$j] . "-lab"][$inner]['lab_day'])) {

                                    foreach ($sched[$courseIds[$i] . "-lab"][$outer]['lab_day'] as $day) {
                                        $in_array = false;
                                        if (in_array($day , $sched[$courseIds[$j] . "-lab"][$inner]['lab_day'])) {
                                            $in_array = true;
                                            break;
                                        }
                                    }

                                    if ($in_array){
                                        if ($sched[$courseIds[$i] . "-lab"][$outer]['lab_fr'] != "TBA" && $sched[$courseIds[$i] . "-lab"][$outer]['lab_to'] != "TBA" && $sched[$courseIds[$j] . "-lab"][$inner]['lab_fr'] != "TBA" && $sched[$courseIds[$j] . "-lab"][$inner]['lab_fr'] != "TBA" ) {
                                            $rangeOuter = range($sched[$courseIds[$i] . "-lab"][$outer]['lab_fr'],$sched[$courseIds[$i] . "-lab"][$outer]['lab_to']);
                                            $rangeInner = range($sched[$courseIds[$j] . "-lab"][$inner]['lab_fr'], $sched[$courseIds[$j] . "-lab"][$inner]['lab_to']);

                                            if (count(array_intersect($rangeOuter, $rangeInner)) > 0  && ($rangeOuter[count($rangeOuter) - 1] != $rangeInner[0] && $rangeInner[count($rangeInner)-1] != $rangeOuter[0]) ) {
                                                if ($courseIds[$i] == $courseIds[$j] && $outer == $inner) {
                                                    continue;
                                                }
                                                $self = $sched[$courseIds[$i]]['course']['code'];
                                                $conflict = $sched[$courseIds[$j]]['course']['code'];
                                                array_push($conflicts, array('self' => $self, 'selfType' => 'lab', 'outer' => $outer, 'conflict' => $conflict, 'conflictType' => 'lab', 'inner' => $inner));
                                            }
                                        }
                                    }

                                }
                            }
                        }
                    }
                }
            }
        }

        return json_encode($conflicts);
    }

    public function submit(Request $request){
        $year = request('year');

        $sem = request('sem');

        $section = request('section');

        $size = request('size');

        $curricula_id = request('curricula_id');

        $curriculas = Curricula::where('id', $curricula_id)->first();

        $curriculaYss = $curriculas->curriculaYss()->where('year',$year)->where('sem',$sem)->get();

        $courseIds = array();

        $courseIdsWLab = array();

        foreach($curriculaYss as $curriculaYs){
            $curriculaDetails = $curriculaYs->curriculaDetails;
            foreach ($curriculaDetails as $curriculaDetail){

                if($curriculaDetail->course->lab_unit > 0){
                    $courseIdsWLab[] = $curriculaDetail->course->id;
                }
                $courseIds[] = $curriculaDetail->course->id;
            }
        }

        for ($i = 0; $i < count($courseIdsWLab); $i++) {
            $sched[$courseIdsWLab[$i] . "-lab"] = $request->input("$courseIdsWLab[$i]-lab");
            //$sched[$courseIdsWLab[$i]]['course'] = Courses::where('id', $courseIdsWLab[$i])->first()["attributes"];
        }

        for ($i = 0; $i < count($courseIds); $i++) {
            $sched[$courseIds[$i]] = $request->input("$courseIds[$i]");
            if(!isset($sched[$courseIds[$i]]['course'])){
                $sched[$courseIds[$i]]['course'] = Courses::where('id', $courseIds[$i])->first()->toArray();
            }
        }

        $current_month = date("m");
        $current_year = date("Y");
        if($current_month > 2){
               $SY = $current_year . '-' . ($current_year + 1);
        }else if($current_month < 6)
               $SY = ($current_year - 1) . '-' . $current_year;


        $cysObj = Cys::where("cy", $SY)->first();

        $schedule_obj = Schedules::create([
            'user_id' => Auth::user()->id,
            'curricula_id' => $curricula_id,
            'year' => $year,
            'sem' => $sem,
            'section' => $section,
            'cy_id' => $cysObj->id,
            'size' => (int)$size,
        ]);

        for ($i = 0; $i < count($courseIds); $i++){
            foreach($sched[$courseIds[$i]] as $outer => $value) {
                if (!is_int($outer)) {
                    continue;
                }
                $days = implode("-", $sched[$courseIds[$i]][$outer]["lec_day"]);

                if($sched[$courseIds[$i]][$outer]["lec_bldg"] == "TBA"){
                    $sched[$courseIds[$i]][$outer]["lec_bldg"] = 0;
                }

                if($sched[$courseIds[$i]][$outer]["lec_room"] == "TBA"){
                    $sched[$courseIds[$i]][$outer]["lec_room"] = 0;
                }

                if($sched[$courseIds[$i]][$outer]["lec_fr"] == "TBA"){
                    $sched[$courseIds[$i]][$outer]["lec_fr"] = 0;
                }

                if($sched[$courseIds[$i]][$outer]["lec_to"] == "TBA"){
                    $sched[$courseIds[$i]][$outer]["lec_to"] = 0;
                }

                if($sched[$courseIds[$i]][$outer]["lec_fac"] == "TBA"){
                    $sched[$courseIds[$i]][$outer]["lec_fac"] = 0;
                }

                $lecLab = LecLab::create([
                    'schedule_id' => $schedule_obj->id,
                    'course_id' => $courseIds[$i],
                    'bldg_id' => $sched[$courseIds[$i]][$outer]["lec_bldg"],
                    'room_id' => $sched[$courseIds[$i]][$outer]["lec_room"],
                    'fr_id' => $sched[$courseIds[$i]][$outer]["lec_fr"],
                    'to_id' => $sched[$courseIds[$i]][$outer]["lec_to"],
                    'day' => $days,
                    'emp_id' => $sched[$courseIds[$i]][$outer]["lec_fac"],
                    'type' => 1,
                    'course_type' => $sched[$courseIds[$i]][$outer]["lec_type"],
                    'dept_id' => $sched[$courseIds[$i]][0]["lec_dept"],
                    'instance' => $outer
                ]);


            }
            $department = \App\Departments::where('id',$sched[$courseIds[$i]][0]["lec_dept"])->first();
            if($department->id != Auth::user()->dept_id){
                pending_ge::create([
                    "schedule_id" => $schedule_obj->id,
                    'course_id' => $courseIds[$i],
                    'user_id' => $department->id
                ]);
            }
        }

        for ($i = 0; $i < count($courseIdsWLab); $i++){
            foreach($sched[$courseIdsWLab[$i] . "-lab"] as $outer => $value) {

                $days = implode("-", $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_day"]);

                if($sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_bldg"] == "TBA"){
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_bldg"] = 0;
                }

                if($sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_room"] == "TBA"){
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_room"] = 0;
                }

                if($sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fr"] == "TBA"){
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fr"] = 0;
                }

                if($sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_to"] == "TBA"){
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_to"] = 0;
                }

                if($sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fac"] == "TBA"){
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fac"] = 0;
                }

                $lecLab = LecLab::create([
                    'schedule_id' => $schedule_obj->id,
                    'course_id' => $courseIdsWLab[$i],
                    'bldg_id' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_bldg"],
                    'room_id' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_room"],
                    'fr_id' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fr"],
                    'to_id' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_to"],
                    'day' => $days,
                    'emp_id' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fac"],
                    'type' => 2,
                    'course_type' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_type"],
                    'dept_id' => $sched[$courseIdsWLab[$i]][0]["lec_dept"],
                    'instance' => $outer
                ]);


            }
        }
        if ($lecLab) {
            return 0;
        }else{
            return 1;
        }
    }

    public function editSubmit(Request $request){

        $year = request('year');

        $sem = request('sem');

        $section = request('section');

        $size = request('size');

        $curricula_id = request('curricula_id');

        $curriculas = Curricula::where('id', $curricula_id)->first();

        $curriculaYss = $curriculas->curriculaYss()->where('year',$year)->where('sem',$sem)->get();

        $courseIds = array();

        $courseIdsWLab = array();

        foreach($curriculaYss as $curriculaYs){
            $curriculaDetails = $curriculaYs->curriculaDetails;
            foreach ($curriculaDetails as $curriculaDetail){

                if($curriculaDetail->course->lab_unit > 0){
                    $courseIdsWLab[] = $curriculaDetail->course->id;
                }
                $courseIds[] = $curriculaDetail->course->id;
            }
        }

        for ($i = 0; $i < count($courseIdsWLab); $i++) {
            $sched[$courseIdsWLab[$i] . "-lab"] = $request->input("$courseIdsWLab[$i]-lab");
            //$sched[$courseIdsWLab[$i]]['course'] = Courses::where('id', $courseIdsWLab[$i])->first()["attributes"];
        }

        for ($i = 0; $i < count($courseIds); $i++) {
            $sched[$courseIds[$i]] = $request->input("$courseIds[$i]");
            if(!isset($sched[$courseIds[$i]]['course'])){
                $sched[$courseIds[$i]]['course'] = Courses::where('id', $courseIds[$i])->first()->toArray();
            }
        }

        $current_month = date("m");
        $current_year = date("Y");
        if($current_month > 2){
               $SY = $current_year . '-' . ($current_year + 1);
        }else if($current_month < 6)
               $SY = ($current_year - 1) . '-' . $current_year;


        $cysObj = Cys::where("cy", $SY)->first();

        $schedule_id = request('schedule_id');



        for ($i = 0; $i < count($courseIds); $i++){
            $outers = array();
            foreach($sched[$courseIds[$i]] as $outer => $value) {
                if (!is_int($outer)) {
                    continue;
                }
                array_push($outers, $outer);
                $days = implode("-", $sched[$courseIds[$i]][$outer]["lec_day"]);

                if($sched[$courseIds[$i]][$outer]["lec_bldg"] == "TBA"){
                    $sched[$courseIds[$i]][$outer]["lec_bldg"] = 0;
                }

                if($sched[$courseIds[$i]][$outer]["lec_room"] == "TBA"){
                    $sched[$courseIds[$i]][$outer]["lec_room"] = 0;
                }

                if($sched[$courseIds[$i]][$outer]["lec_fr"] == "TBA"){
                    $sched[$courseIds[$i]][$outer]["lec_fr"] = 0;
                }

                if($sched[$courseIds[$i]][$outer]["lec_to"] == "TBA"){
                    $sched[$courseIds[$i]][$outer]["lec_to"] = 0;
                }

                if($sched[$courseIds[$i]][$outer]["lec_fac"] == "TBA"){
                    $sched[$courseIds[$i]][$outer]["lec_fac"] = 0;
                }

                $lecLab = LecLab::where('schedule_id', $schedule_id)->where('course_id', $courseIds[$i])->where('type', 1)->where('instance',$outer)->first();

                if( is_null($lecLab) ){
                    $lecLab = LecLab::create([
                        'schedule_id' => $schedule_id,
                        'course_id' => $courseIds[$i],
                        'bldg_id' => $sched[$courseIds[$i]][$outer]["lec_bldg"],
                        'room_id' => $sched[$courseIds[$i]][$outer]["lec_room"],
                        'fr_id' => $sched[$courseIds[$i]][$outer]["lec_fr"],
                        'to_id' => $sched[$courseIds[$i]][$outer]["lec_to"],
                        'day' => $days,
                        'emp_id' => $sched[$courseIds[$i]][$outer]["lec_fac"],
                        'type' => 1,
                        'course_type' => $sched[$courseIds[$i]][$outer]["lec_type"],
                        'instance' => $outer,
                    ]);
                }else{
                    $lecLab->bldg_id = $sched[$courseIds[$i]][$outer]["lec_bldg"];
                    $lecLab->room_id = $sched[$courseIds[$i]][$outer]["lec_room"];
                    $lecLab->fr_id = $sched[$courseIds[$i]][$outer]["lec_fr"];
                    $lecLab->to_id = $sched[$courseIds[$i]][$outer]["lec_to"];
                    $lecLab->day = $days;
                    $lecLab->emp_id = $sched[$courseIds[$i]][$outer]["lec_fac"];

                    $lecLab->save();
                }
            }
            $lecLabs = LecLab::select(['id','instance'])->where('schedule_id', $schedule_id)->where('course_id', $courseIds[$i])->where('type', 1)->get();
            foreach ($lecLabs as $lecLab) {
                if (!in_array($lecLab->instance, $outers)) {
                    $lecLab = LecLab::where('id',$lecLab->id)->delete();
                }
            }
        }

        for ($i = 0; $i < count($courseIdsWLab); $i++){
            $outers = array();
            foreach($sched[$courseIdsWLab[$i] . "-lab"] as $outer => $value) {
                array_push($outers, $outer);
                $days = implode("-", $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_day"]);

                if($sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_bldg"] == "TBA"){
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_bldg"] = 0;
                }

                if($sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_room"] == "TBA"){
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_room"] = 0;
                }

                if($sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fr"] == "TBA"){
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fr"] = 0;
                }

                if($sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_to"] == "TBA"){
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_to"] = 0;
                }

                if($sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fac"] == "TBA"){
                    $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fac"] = 0;
                }

                $lecLab = LecLab::where('schedule_id', $schedule_id)->where('course_id', $courseIdsWLab[$i])->where('type', 2)->where('instance', $outer)->first();

                if(is_null($lecLab)){
                    $lecLab = LecLab::create([
                        'schedule_id' => $schedule_id,
                        'course_id' => $courseIdsWLab[$i],
                        'bldg_id' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_bldg"],
                        'room_id' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_room"],
                        'fr_id' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fr"],
                        'to_id' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_to"],
                        'day' => $days,
                        'emp_id' => $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fac"],
                        'type' => 2,
                        'course_type' => $sched[$courseIds[$i]][$outer]["lab_type"],
                        'instance' => $outer,
                    ]);
                }else{
                    $lecLab->bldg_id = $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_bldg"];
                    $lecLab->room_id = $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_room"];
                    $lecLab->fr_id = $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fr"];
                    $lecLab->to_id = $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_to"];
                    $lecLab->day = $days;
                    $lecLab->emp_id = $sched[$courseIdsWLab[$i] . "-lab"][$outer]["lab_fac"];

                    $lecLab->save();
                }
            }
            $lecLabs = LecLab::select(['id','instance'])->where('schedule_id', $schedule_id)->where('course_id', $courseIdsWLab[$i])->where('type', 2)->get();
            foreach ($lecLabs as $lecLab) {
                if (!in_array($lecLab->instance, $outers)) {
                    $lecLab = LecLab::where('id',$lecLab->id)->delete();
                }
            }
        }
        if ($lecLab) {
            return 0;
        }else{
            return 1;
        }
    }

    public function pendingSubmit(Request $request){

        $year = request('year');

        $sem = request('sem');

        $section = request('section');

        $size = request('size');

        $curricula_id = request('curricula_id');

        $curriculas = Curricula::where('id', $curricula_id)->first();

        $curriculaYss = $curriculas->curriculaYss()->where('year',$year)->where('sem',$sem)->get();

        $courseIds = array();

        $courseIdsWLab = array();

        $pendingSchedules = \App\pending_ge::where('user_id', Auth::user()->dept_id)->where('schedule_id', request('schedule_id'))->get();

        $success = 0;

        foreach ($pendingSchedules as $pendingSchedule) {

            $lecLab = LecLab::where('schedule_id', $pendingSchedule->schedule_id)->where('course_id', $pendingSchedule->course_id)->where('type', 1)->first();

            $course = Courses::where('id', $lecLab->course_id)->first();

            $sched[$pendingSchedule->course_id] = $request->input("$pendingSchedule->course_id");

            $lecLab->emp_id = $sched[$pendingSchedule->course_id][0]["lec_fac"];
            $saved = $lecLab->save();

            if ($course->lab_unit > 0) {
                $lecLab = LecLab::where('schedule_id', $pendingSchedule->schedule_id)->where('course_id', $pendingSchedule->course_id)->where('type', 2)->first();

                $sched[$pendingSchedule->course_id . "-lab"] = $request->input("$pendingSchedule->course_id"."-lab");

                $lecLab->emp_id = $sched[$pendingSchedule->course_id . "-lab"][0]["lab_fac"];
                $saved = $lecLab->save();
            }

            if($saved){
                $success = 1;
            }else{
                $success = 0;
                break;
            }
        }

        return $success;
    }

    public function checkHour(Request $request){

        $courseId = request('course_id');

        $course = Courses::where('id', $courseId)->first();

        $days = count($request->input('days'));

        $fr = request('fr');

        $to = request('to');

        $type = request('type');
        ($type == "lec") ? ($col = "lecture_units") && ($multip = 1) : ($col = "lab_unit") && ($multip = 3);
        $hours = ((abs($to - $fr)*30)/60)*$days;

        if ($hours != $course[$col] * $multip) {
            return -1;
        }else{
            return 1;
        }
    }

    public function checkFaculty(Request $request)
    {

        $availableTimeFac = array();

        $days[1] = array(
            'M',
            'T',
            'W',
            'Th',
            'F',
        );
        $allTime = range(2,30);

        $sem = request('sem');

        $cy = request('cy');

        $faculty = request('faculty');

        foreach ($days[1] as $day) {
            $availableTimeFac[$day] = array();

            $schedules = LecLab::where('emp_id', $faculty)->where('day', 'like', "%". $day ."%")->whereHas('sched', function($q) use($cy, $sem){
                $q->where("cy_id", $cy)->where("sem", $sem);
            })->get();

            foreach ($schedules as $schedule) {
                $availableTimeFac[$day] = array_unique(array_merge($availableTimeFac[$day], range($schedule["fr_id"]+1, $schedule["to_id"]-1)), SORT_NUMERIC );
            }
            $availableTime[$day] = array_diff($allTime, $availableTimeFac[$day]);
        }

        $from = request('from');

        $to = request('to');

        $range = range($from, $to);

        $ds = request('days');

        $conflict = 0;

        foreach ($ds as $d) {
            if ( count(array_intersect($range, $availableTime[$d])) == count($range)) {
                $conflict = 0;
            }else{
                $conflict = 1;
                break;
            }
        }

        return $conflict ;
    }

    public function checkRoom(Request $request)
    {

        $availableTimeRoom = array();

        $days[1] = array(
            'M',
            'T',
            'W',
            'Th',
            'F',
        );
        $allTime = range(2,30);

        $sem = request('sem');

        $cy = request('cy');

        $room = request('room');

        foreach ($days[1] as $day) {
            $availableTimeRoom[$day] = array();

            $schedules = LecLab::where('room_id', $room)->where('day', 'like', "%". $day ."%")->whereHas('sched', function($q) use($cy, $sem){
                $q->where("cy_id", $cy)->where("sem", $sem);
            })->get();

            foreach ($schedules as $schedule) {
                $availableTimeRoom[$day] = array_unique(array_merge($availableTimeRoom[$day], range($schedule["fr_id"]+1, $schedule["to_id"]-1)), SORT_NUMERIC );
            }
            $availableTime[$day] = array_diff($allTime, $availableTimeRoom[$day]);
        }

        $from = request('from');

        $to = request('to');

        $range = range($from, $to);

        $ds = request('days');

        $conflict = 0;

        foreach ($ds as $d) {
            if ( count(array_intersect($range, $availableTime[$d])) == count($range)) {
                $conflict = 0;
            }else{
                $conflict = 1;
                break;
            }
        }

        return $conflict ;
    }

    public function tableSched()
    {
        $timeCodes = TimeCodes::all();
        return view("schedules.tableSched", compact("timeCodes"));
    }

    public function setTableSched(Request $request)
    {
        return json_encode($request);
    }

    public function getSY()
    {
        $current_month = date("m");
        $current_year = date("Y");
        if($current_month > 2){
               $SY = $current_year . '-' . ($current_year + 1);
        }else if($current_month < 6)
               $SY = ($current_year - 1) . '-' . $current_year;
        echo $SY;
    }


}
