@php
	$cy = $request->cy;

    $sem = $request->sem;

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

@endphp

@foreach($rooms as $room)	

	@php
		$lecLabs = \App\LecLab::where('room_id', $room->id)->whereHas('sched', function($q) use($cy, $sem){
	        $q->where("cy_id", $cy)->where("sem", $sem);
	    })->where('fr_id', '<>', 0)->get();

		$timeCodes = \App\TimeCodes::whereBetween('id', [$lecLabs->min('fr_id'), $lecLabs->max('to_id')])->get();

		$days = ["M", "T", "W", "Th", "F", "S","Sn"];
	@endphp
	
	@if(count($lecLabs) > 0)
		<div class="col-md-12">
			<center>
				<h4>College: {{ $room->college->bldg }}</h4>
				<h4>Room: {{ $room->number }}</h4>
			</center>
		</div>
		<table class="table table-inverse {{ $room->id }} table-format" id="input-table" class="">
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