@php
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
    
@endphp

@foreach ($employees as $employee)
	@php

		$faculty = $employee->personnelInfo;

		$lecLabs = \App\LecLab::where('emp_id', $faculty->id)->whereHas('sched', function($q) use($cy, $sem){
	        $q->where("cy_id", $cy)->where("sem", $sem);
	    })->get();

	@endphp
	@if(count($lecLabs) > 0)
		<div class="col-md-12">
			<center>
				<h4>College: {{ $employee->bldg->bldg }}</h4>
				<h4>Faculty: {{ $faculty->surname }}, {{ $faculty->firstname }} {{ $faculty->middlename }}</h4>
			</center>
		</div>
		<table class="table table-inverse" id="input-table">
			<thead>
				<tr>
					<th>Degree</th>
					<th>Year</th>
					<th>Sem</th>
					<th>Section</th>
					<th>Course Code</th>
					<th>Units</th>
					<th>Time</th>
					<th>Day</th>
					<th>Bldg</th>
					<th>Room</th>
					<th>Instructor</th>
				</tr>
			</thead>
			<tbody>

				@foreach($lecLabs as $lecLab)
					<tr>
						<td>{{ $lecLab->sched->user->degree->degree }}</td>
						<td>{{ $lecLab->sched->year }}</td>
						<td>{{ $lecLab->sched->sem }}</td>
						<td>{{ $lecLab->sched->section }}</td>
						<td nowrap><b>{{ \App\Courses::where('id',$lecLab->course_id)->first()->code }} {{ $lecLab->type == 2 ? "-Lab" : "" }} </b></td>

						<td>{{ \App\Courses::where('id',$lecLab->course_id)->first()->lecture_units }} </td>

						@php
							if ($lecLab->fr_id != 0 && $lecLab->to_id != 0 ) {
								$value = \App\TimeCodes::where('id', $lecLab->fr_id)->first()->time . "-" . \App\TimeCodes::where('id', $lecLab->to_id)->first()->time;
							}else{
								$value = "TBA";
							}
							
						@endphp

						<td>{{ $value }}</td>
						<td>{{ $lecLab->day }}</td>
						@php
							if ($lecLab->bldg_id != 0) {
								$value = \App\Bldg::where('id', $lecLab->bldg_id)->first()->bldg;
							}else{
								$value = "TBA";
							}

						@endphp

						<td>{{ $value }}</td>

						@php
							if ($lecLab->room_id != 0) {
								$value = \App\Rooms::where('id', $lecLab->room_id)->first()->number;
							}else{
								$value = "TBA";
							}
						@endphp

						<td>{{ $value }}</td>

						@php
							$faculty = \App\Pi1::where('id', $lecLab->emp_id)->first();
						@endphp
						@if($lecLab->emp_id != 0)
							<td>{{ $faculty->surname }}, {{ $faculty->firstname }} {{ $faculty->middlename }}</td>
						@else
							<td>TBA</td>
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@endforeach