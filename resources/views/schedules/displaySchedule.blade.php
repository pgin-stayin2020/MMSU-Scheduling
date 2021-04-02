@if(isset($schedule))

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

@endif
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

		@for ($i = 0; $i < count($courseIds); $i++)
			@php
				$lab_unit = $sched[$courseIds[$i]]["course"]["lab_unit"];
			@endphp
		    @foreach($sched[$courseIds[$i]] as $outer => $value)
				@if (is_int($outer))
					<tr>

						<td nowrap><b>{{ $sched[$courseIds[$i]]["course"]["code"] }} {{ $lab_unit != 0 ? " LEC" : "" }}</b></td>

						<td>{{ $sched[$courseIds[$i]]["course"]["lecture_units"] }}</td>

						@php
							if ($sched[$courseIds[$i]][$outer]["lec_fr"] != 0 && $sched[$courseIds[$i]][$outer]["lec_to"] != 0 ) {
								$value = \App\TimeCodes::where('id', $sched[$courseIds[$i]][$outer]["lec_fr"])->first()->time . "-" . \App\TimeCodes::where('id', $sched[$courseIds[$i]][$outer]["lec_to"])->first()->time;
							}else{
								$value = "TBA";
							}
							
						@endphp

						<td>{{ $value }}</td>
						<td>{{ implode("", $sched[$courseIds[$i]][$outer]["lec_day"]) }}</td>
						@php
							if ($sched[$courseIds[$i]][$outer]["lec_bldg"] != 0) {
								$value = \App\Bldg::where('id', $sched[$courseIds[$i]][$outer]["lec_bldg"])->first()->bldg;
							}else{
								$value = "TBA";
							}

						@endphp

						<td>{{ $value }}</td>

						@php
							if ($sched[$courseIds[$i]][$outer]["lec_room"] != 0) {
								$value = \App\Rooms::where('id', $sched[$courseIds[$i]][$outer]["lec_room"])->first()->number;
							}else{
								$value = "TBA";
							}
						@endphp

						<td>{{ $value }}</td>

						@php
							$faculty = \App\Pi1::where('id', $sched[$courseIds[$i]][$outer]["lec_fac"])->first();
						@endphp
						@if($sched[$courseIds[$i]][$outer]["lec_fac"] != 0)
							<td>{{ $faculty->surname }}, {{ $faculty->firstname }} {{ $faculty->middlename }}</td>
						@else
							<td>TBA</td>
						@endif
					</tr>
				@endif
			@endforeach
			@if($lab_unit > 0 && !isset($room))
				@foreach($sched[$courseIds[$i] . "-lab"] as $outer => $value)
					<tr>
						<td nowrap><b>{{ $sched[$courseIds[$i]]["course"]["code"] }} {{ $lab_unit != 0 ? " LAB" : "" }}</b></td>

						<td>{{ $sched[$courseIds[$i]]["course"]["lab_unit"] }}</td>

						<td>{{ $sched[$courseIds[$i] . "-lab"][$outer]["lab_fr"] != 0 ? \App\TimeCodes::where('id', $sched[$courseIds[$i] . "-lab"][$outer]["lab_fr"])->first()->time : "TBA" }}-{{ $sched[$courseIds[$i] . "-lab"][$outer]["lab_to"] != 0 ?  \App\TimeCodes::where('id', $sched[$courseIds[$i] . "-lab"][$outer]["lab_to"])->first()->time : "TBA" }}</td>

						<td>{{ implode("", $sched[$courseIds[$i]  . "-lab"][$outer]["lab_day"]) }}</td>

						<td>{{ $sched[$courseIds[$i] . "-lab" ][$outer]["lab_bldg"] != 0 ? \App\Bldg::where('id', $sched[$courseIds[$i] . "-lab" ][$outer]["lab_bldg"])->first()->bldg : "TBA" }}</td>

						<td>{{ $sched[$courseIds[$i] . "-lab"][$outer]["lab_room"] != 0 ? \App\Rooms::where('id', $sched[$courseIds[$i] . "-lab"][$outer]["lab_room"])->first()->number : "TBA" }}
						</td>
						@php
							$faculty = \App\Pi1::where('id', $sched[$courseIds[$i] . "-lab"][$outer]["lab_fac"])->first();
						@endphp

						@if($sched[$courseIds[$i] . "-lab"][$outer]["lab_fac"] != 0)
							<td>{{ $faculty->surname }}, {{ $faculty->firstname }} {{ $faculty->middlename }}</td>
						@else
							<td>TBA</td>
						@endif
					</tr>
				@endforeach
			@endif
		    
		@endfor