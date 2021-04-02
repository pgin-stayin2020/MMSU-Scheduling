@php
	$cy = request('cy');

    $sem = request('sem');

    $faculty = request('emp_id');

    $curricula_id = request('curricula_id');

    $year = request('year');

    $raw = "";

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
    
@endphp

@foreach ($schedules as $schedule)
	
	@php
		$lecLabs = \App\LecLab::where('schedule_id', $schedule->id)->get();
	@endphp
	@if(count($lecLabs) > 0)
		<div class="col-md-12">
			<center>
				<h4>College: {{ $schedule->user->degree->college->bldg }}</h4>
				<h4>Degree: {{ $schedule->user->degree->degree }}</h4>
				<h4>Section: {{ $schedule->section }}</h4>
				<h4>Year: {{ $schedule->year }}</h4>
				<h4>Sem: {{ $schedule->sem }}</h4>
				<h4>SY: {{ \App\Cys::where('id',$schedule->cy_id)->first()->cy }}</h4>
			</center>
		</div>
		<table class="table table-inverse" id="input-table">
			<thead>
				<tr>
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
						<td nowrap><b>{{ \App\Courses::where('id',$lecLab->course_id)->first()->code }}</b></td>

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