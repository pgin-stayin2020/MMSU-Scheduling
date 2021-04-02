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
        $lecLabs = \App\LecLab::where('schedule_id', $schedule->id)->where('fr_id', '<>', 0)->get();
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
        <table class="table table-inverse {{ $schedule->id }} table-format" id="input-table" class="">
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