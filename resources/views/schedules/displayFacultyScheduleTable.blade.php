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
	    })->where('fr_id', '<>', 0)->get();

		$timeCodes = \App\TimeCodes::whereBetween('id', [$lecLabs->min('fr_id'), $lecLabs->max('to_id')])->get();

		$days = ["M", "T", "W", "Th", "F", "S","Sn"];

	@endphp
	@if(count($lecLabs) > 0)
		<div class="col-md-12">
			<center>
				<h4>College: {{ $employee->bldg->bldg }}</h4>
				<h4>Faculty: {{ $faculty->surname }}, {{ $faculty->firstname }} {{ $faculty->middlename }}</h4>
			</center>
		</div>
		<table class="table table-inverse {{ $faculty->id }} table-format" id="input-table">
			<thead>
				<tr>
					<th>Time \ Day</th>
					<th>M</th>
					<th>T</th>
					<th>W</th>
					<th>Th</th>
					<th>F</th>
					<th>S</th>
					<th>Sn</th>
				</tr>
			</thead>
			<tbody>
				@for($i = 0; $i < count($timeCodes)-1; $i++)
					<tr>
						<td class="{{ $timeCodes[$i]['id'] }}">{{ $timeCodes[$i]['time'] }}-{{ $timeCodes[$i + 1]['time'] }}</td>
						@foreach($days as $day)
							<td class="{{ $timeCodes[$i]['id'] }}-{{ $day }}"></td>
						@endforeach
					</tr>
				@endfor
			</tbody>
		</table>
	@endif
@endforeach