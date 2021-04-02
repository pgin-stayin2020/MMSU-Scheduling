@php
	$schedule = \App\Schedules::where('id', request('schedule_id'))->first();
@endphp

	@php

		$lecLabs = $schedule->lecLabs()->where('fr_id','<>',0);

		$timeCodes = \App\TimeCodes::whereBetween('id', [$lecLabs->min('fr_id'), $lecLabs->max('to_id')])->get();

		$days = ["M", "T", "W", "Th", "F", "S","Sn"];

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
		<table class="table table-inverse {{ $schedule->id }} table-format" id="input-table">
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
