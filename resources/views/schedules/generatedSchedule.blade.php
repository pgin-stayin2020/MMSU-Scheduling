
<table class="table table-inverse" id="input-table">
	<thead>
		<tr>
			<th>Course Code</th>
			<th>Title</th>
			<th>Section</th>
			<th>Units</th>
			<th>Hours</th>
			<th nowrap="true">
				<label class="checkbox-inline">
					<input type="checkbox"  id="checkAll" 
					@isset ($notGenerate)
						{{ $notGenerate ? "" : "checked" }}
					@endisset
					>Generate All
				</label>
			</th>
			<th>From</th>
			<th>To</th>
			<th>Day</th>
			<th>Bldg</th>
			<th>Room</th>
			<th>Type</th>
			<th>Instructor</th>
			<th>Department</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		
		@for ($i = 0; $i < count($courseIds); $i++)
			@php
				$lab_unit = $sched[$courseIds[$i]]["course"]["lab_unit"];
			@endphp
            @foreach($sched[$courseIds[$i]] as $outer => $value)

            	@if (is_int($outer))
            		
					<tr id="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lec-{{ $outer }}">
						<td nowrap>{{ $sched[$courseIds[$i]]["course"]["code"] }} {{ $lab_unit != 0 ? " LEC" : "" }}</td>
						<td nowrap>{{ $sched[$courseIds[$i]]["course"]["title"] }}</td>
						<td>{{ $request->section }}</td>
						<td>{{ $sched[$courseIds[$i]]["course"]["lecture_units"] }}</td>
						<td>{{ $sched[$courseIds[$i]]["course"]["lecture_hours"] }}</td>
						<td>
							@if ($outer < 1)
								<div class="form-group">
									<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_generate]" class="generate" value="true" 
									{{ isset($sched[$courseIds[$i]][$outer]['lec_generate']) ? "checked" : "" }}
									{{ count($sched[$courseIds[$i]]) - 1 > 1 ? "disabled" : "" }}
									>
								</div>
							@endif
						</td>
						<td>
							<div class="form-group">
								<select name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_fr]" class="form-control from" onchange="checkTime(this)" {{ isset($pending) ? "disabled" : "" }} >
									<option value="">-- Time --</option>
									<option value="TBA" {{ "TBA" == $sched[$courseIds[$i]][$outer]["lec_fr"] ? "selected" : "" }}>TBA</option>
									@foreach ($timeCodes as $timeCode)
										<option value="{{ $timeCode->id }}" {{ $timeCode->id == $sched[$courseIds[$i]][$outer]["lec_fr"] ? "selected" : "" }}>{{ $timeCode->time }}</option>
									@endforeach
								</select>
								
								<div class="invalid-feedback">
									
								</div>
							</div>
						</td>
						<td>
							<div class="form-group">
								<select name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_to]" class="form-control to" onchange="checkTime(this)" {{ isset($pending) ? "disabled" : "" }}>
									<option value="">-- Time --</option>
									<option value="TBA" {{ "TBA" == $sched[$courseIds[$i]][$outer]["lec_to"] ? "selected" : "" }}>TBA</option>
									@foreach ($timeCodes as $timeCode)
										<option value="{{ $timeCode->id }}" {{ $timeCode->id == $sched[$courseIds[$i]][$outer]["lec_to"] ? "selected" : "" }}>{{ $timeCode->time }}</option>
									@endforeach
								</select>

								<div class="invalid-feedback">
									
								</div>
							</div>
						</td>
						<td style="min-width: 300px">
							<div class="form-group" id = "days">
								<label class="checkbox-inline">
									<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_day][]" value="M" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("M", $sched[$courseIds[$i]][$outer]["lec_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>M
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_day][]" value="T" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("T", $sched[$courseIds[$i]][$outer]["lec_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>T
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_day][]" value="W" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("W", $sched[$courseIds[$i]][$outer]["lec_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>W
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_day][]" value="Th" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("Th", $sched[$courseIds[$i]][$outer]["lec_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>Th
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_day][]" value="F" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("F", $sched[$courseIds[$i]][$outer]["lec_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>F
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_day][]" value="S" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("S", $sched[$courseIds[$i]][$outer]["lec_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>S
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_day][]" value="Sn" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("Sn", $sched[$courseIds[$i]][$outer]["lec_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>Sn
								</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_day][]" value="TBA" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("TBA", $sched[$courseIds[$i]][$outer]["lec_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>TBA
								</label>
								<div class="invalid-feedback">
									Total hours does not add up to the hours needed.
								</div>
							</div>
						</td>
						<td>
							<div class="form-group">
								<select name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_bldg]" onchange="setRooms({{ $sched[$courseIds[$i]]["course"]["id"] }},'lec',this)" class="form-control bldg"  {{ isset($pending) ? "disabled" : "" }}
								onchange="checkRoom(this)"
								>
									<option value="">Building</option>
									<option value="TBA" {{ 'TBA' == $sched[$courseIds[$i]][$outer]["lec_bldg"] ? "selected" : "" }}>TBA</option>
									@foreach ($bldgs as $bldg)
										<option value="{{ $bldg->id }}" {{ $bldg->id == $sched[$courseIds[$i]][$outer]["lec_bldg"] ? "selected" : "" }}>{{ $bldg->bldg }}</option>
									@endforeach
								</select>

							</div>
						</td>
						<td>
							<div class="form-group">
								<select name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_room]" class="form-control room"  {{ isset($pending) ? "disabled" : "" }}
								onchange="checkRoom(this)"
								>
								@php
									$bldg_tba = false;
									$bldg_id = $sched[$courseIds[$i]][$outer]["lec_bldg"];
									if($bldg_id == "TBA" || $bldg_id == ""){
										$bldg_tba = true;
										$rooms = array("id" => "TBA", "number", "TBA");
						            }else{
										$rooms = \App\Rooms::where('bldg_id', $bldg_id)->where('room_type_id', 1)->orderBy('number')->get();
						            }
								@endphp
								@if ($bldg_tba)
									<option value = 'TBA' {{ 'TBA' == $sched[$courseIds[$i]][$outer]["lec_room"] ? "selected" : "" }} >TBA</option>
								@else
									@foreach ($rooms as $room)
										<option value = '{{ $room->id }}' {{ $room->id == $sched[$courseIds[$i]][$outer]["lec_room"] ? "selected" : "" }} >{{ $room->number }}</option>
									@endforeach
								@endif
								
								
								</select>
								<label class="customError" style="display:none">The room has conflict </label>
							</div>
						</td>
						<td>
							<div class="form-group">
								<select name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[0][lec_type]" class="form-control type" {{ isset($edit) ? "readonly" : "" }}>
									<option value=1>Lecture</option>
								</select>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="hidden" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_fac]" class="form-control faculty" value="{{ $sched[$courseIds[$i]][$outer]["lec_fac"] }}" 
									@if (isset($pending))
										{{ isset($sched[$courseIds[$i]][0]["pending"]) ? "" : "disabled" }}
									@endif
								>

								@php
									$faculty = $sched[$courseIds[$i]][$outer]["lec_fac"];
									if($faculty != "TBA"){
										$pi1 = \App\Pi1::where('id', $faculty)->first();
										$faculty = "{$pi1->surname}, {$pi1->firstname} {$pi1->middlename}";
									}
								@endphp
								<input list="faculties" value="{{ $faculty }}" class="form-control faculty-placeholder" onchange="checkFac(this)" placeholder="Faculty">
								<label class="customError" style="display:none">The faculty has conflict </label>
								{{-- <select name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[{{ $outer }}][lec_fac]" class="form-control faculty {{ isset($sched[$courseIds[$i]][0]["pending"]) ? "chosen-select-width chosen-select" : "" }}" 
								@if (isset($pending))
									{{ isset($sched[$courseIds[$i]][0]["pending"]) ? "" : "disabled" }}
								@endif
								
								>
									<option value="TBA" {{ "TBA" == $sched[$courseIds[$i]][$outer]["lec_fac"] ? "selected" : "" }}>TBA</option>
									@foreach ($teachingFaculties as $teachingFaculty)
										<option value="{{ $teachingFaculty->personnelInfo['id'] }}" {{ $teachingFaculty->personnelInfo['id'] == $sched[$courseIds[$i]][$outer]["lec_fac"] ? "selected" : "" }}>{{ $teachingFaculty->personnelInfo['surname'] }}, {{ $teachingFaculty->personnelInfo['firstname'] }} {{ $teachingFaculty->personnelInfo['middlename'] }}</option>
									@endforeach
								</select> --}}
							</div>
						</td>
						<td>
							@if ($outer == 0)
								<div class="form-group">
									<select name="{{ $sched[$courseIds[$i]]["course"]["id"] }}[0][lec_dept]" class="form-control {{ !isset($edit) ? ' chosen-select-width chosen-select' : '' }} department" {{ isset($edit) ? "readonly" : "" }} >
										@php
											$depts = \App\Departments::all();
										@endphp
										
										@foreach($depts as $dept)
											<option value="{{ $dept->id }}" {{ $dept->id == $sched[$courseIds[$i]][$outer]["lec_dept"] ? "selected" : "" }}>{{ $dept->department }}</option>
										@endforeach

									</select>
								</div>
							@endif
						</td>
						<td id="action">
							@if ($outer > 0)
								<div class="form-group">
									<button type="button" class="btn btn-danger remove" onclick="minus({{ $sched[$courseIds[$i]]["course"]["id"] }},'lec',{{ $outer }})">-</button>
								</div>
							@else
								<div class="form-group">
									<button type="button" class="btn btn-primary plus" onclick="add({{ $sched[$courseIds[$i]]["course"]["id"] }},'lec')">+</button>
								</div>
							@endif
						</td>
					</tr>
            	@endif
			@endforeach
			@if($lab_unit > 0)
				@foreach ($sched[$courseIds[$i] . "-lab"] as $outer => $value)
					@if (is_int($outer))
						
						<tr id="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab-{{ $outer }}" class="lab">

							<td nowrap>{{ $sched[$courseIds[$i]]["course"]["code"] }} {{ $lab_unit != 0 ? "LAB" : "" }}</td>
							<td nowrap>{{ $sched[$courseIds[$i]]["course"]["title"] }}</td>
							<td>{{ $request->section }}</td>
							<td>{{ $sched[$courseIds[$i]]["course"]["lab_unit"] }}</td>
							<td>{{ $sched[$courseIds[$i]]["course"]["lab_hours"] }}</td>
							<td>
								@if ($outer < 1)
									<div class="form-group">
										<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_generate]" class="generate" value="true" 
										{{ isset($sched[$courseIds[$i]."-lab"][$outer]["lab_generate"]) ? "checked" : "" }}
										{{  count($sched[$courseIds[$i] . "-lab"]) > 1 ? "disabled" : "" }}
										>
									</div>
								@endif
							</td>
							<td>
								<div class="form-group">
									<select name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_fr]" class="form-control from labfrom" onchange="checkTime(this, 'lab')"  {{ isset($pending) ? "disabled" : "" }}>
										<option value="">-- Time --</option>
										<option value="TBA" {{ "TBA" == $sched[$courseIds[$i]."-lab"][$outer]["lab_fr"] ? "selected" : "" }}>TBA</option>
										@php
											$labTimes = array(
												array('id' => 3, 'time' => "8:00 AM"),
												array('id' => 9, 'time' => "11:00 AM"),
												array('id' => 15, 'time' => "2:00 PM"),
											);
										@endphp
										@foreach ($labTimes as $labTime)
											<option value={{ $labTime['id'] }} {{ $labTime['id'] == $sched[$courseIds[$i]."-lab"][$outer]["lab_fr"] ? "selected" : "" }} >{{ $labTime['time'] }}</option>
										@endforeach
									</select>
									
								</div>
							</td>

							<td>
								<div class="form-group">
									<select name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_to]" class="form-control to labto" onchange="checkTime(this, 'lab')"  {{ isset($pending) ? "disabled" : "" }}>
										<option value="">-- Time --</option>
										<option value="TBA" {{ "TBA" == $sched[$courseIds[$i]."-lab"][$outer]["lab_to"] ? "selected" : "" }}>TBA</option>
										@php
											$labTimes = array(
												array('id' => 9, 'time' => "11:00 AM"),
												array('id' => 15, 'time' => "2:00 PM"),
												array('id' => 21, 'time' => "5:00 PM"),
											);
										@endphp
										@foreach ($labTimes as $labTime)
											<option value={{ $labTime['id'] }} {{ $labTime['id'] == $sched[$courseIds[$i]."-lab"][$outer]["lab_to"] ? "selected" : "" }}>{{ $labTime['time'] }}</option>
										@endforeach
									</select>
								</div>
							</td>
							
							<td style="min-width: 300px">
								<div class="form-group" id = "days">
									<label class="checkbox-inline">
										<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_day][]" value="M" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("M", $sched[$courseIds[$i]."-lab"][$outer]["lab_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>M
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_day][]" value="T" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("T", $sched[$courseIds[$i]."-lab"][$outer]["lab_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>T
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_day][]" value="W" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("W", $sched[$courseIds[$i]."-lab"][$outer]["lab_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>W
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_day][]" value="Th" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("Th", $sched[$courseIds[$i]."-lab"][$outer]["lab_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>Th
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_day][]" value="F" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("F", $sched[$courseIds[$i]."-lab"][$outer]["lab_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>F
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_day][]" value="S" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("S", $sched[$courseIds[$i]."-lab"][$outer]["lab_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>S
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_day][]" value="Sn" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("Sn", $sched[$courseIds[$i]."-lab"][$outer]["lab_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>Sn
									</label>
									<label class="checkbox-inline">
										<input type="checkbox" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_day][]" value="TBA" class="day" onclick="checkHour({{ $sched[$courseIds[$i]]["course"]["id"] }}, 'lec',this)" {{ in_array("TBA", $sched[$courseIds[$i]."-lab"][$outer]["lab_day"]) ? "checked" : ""}}  {{ isset($pending) ? "disabled" : "" }}>TBA
									</label>
									<div class="invalid-feedback">
										Total hours does not add up to the hours needed.
									</div>
								</div>
							</td>

							<td>
								<div class="form-group">
									<select name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_bldg]" onchange="setRooms({{ $sched[$courseIds[$i]]["course"]["id"] }},'lec',this)" class="form-control bldg"  {{ isset($pending) ? "disabled" : "" }}>
										<option value="">Building</option>
										<option value="TBA" {{ "TBA" == $sched[$courseIds[$i]."-lab"][$outer]["lab_bldg"] ? "selected" : "" }}>TBA</option>
										@foreach ($bldgs as $bldg)
											<option value="{{ $bldg->id }}" {{ $bldg->id == $sched[$courseIds[$i]."-lab"][$outer]["lab_bldg"] ? "selected" : "" }}>{{ $bldg->bldg }}</option>
										@endforeach
									</select>
								</div>
							</td>
							<td>
								<div class="form-group">
									<select name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_room]" class="form-control room"  {{ isset($pending) ? "disabled" : "" }}>
									@php
										$bldg = $sched[$courseIds[$i] . "-lab"][$outer]["lab_bldg"];
										$bldgTBA = false;
										if($bldg == "TBA" || $bldg == ""){
											$rooms = array("TBA");
											$bldgTBA = true;
							            }else{
											$rooms = \App\Rooms::where('bldg_id', $bldg)->where('room_type_id', '<>' , 1)->orderBy('number')->get();
							            }
									@endphp

									@if($bldgTBA)
									
									<option value = 'TBA' selected >TBA</option>

									@else
										@foreach ($rooms as $room)
											<option value = '{{ $room->id }}' {{ $room->id == $sched[$courseIds[$i]."-lab"][$outer]["lab_room"] ? "selected" : "" }} >{{ $room->number }}</option>
										@endforeach
									
									@endif
									</select>
									<label class="customError" style="display:none">The room has conflict </label>
								</div>
							</td>
							<td>
								<div class="form-group">
									@php
										$types = array(
										array("value" => "", "text" => "Type"),
										array("value" => 4, "text" => "Computer Lab"),
										array("value" => 5, "text" => "Biology Lab"),
										array("value" => 6, "text" => "Chemistry Lab"),
										array("value" => 7, "text" => "Physics Lab"),
										array("value" => 8, "text" => "Speech Lab"),
									);

										$compLab = array(2,3,24);
										$sciencelab = array(20,29);
									@endphp
									
									<select name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[0][lab_type]" class="form-control type" {{ isset($edit) ? "readonly" : "" }} >
			
										@if (in_array($sched[$courseIds[$i]]["course"]["course_type_id"], $compLab))
											<option value=4>Computer Lab</option>
										@else

											@foreach($types as $type)

												<option value={{ $type['value'] }} 
													@if ($type['value'] == (int)$sched[$courseIds[$i]."-lab"][$outer]["lab_type"])
														selected
													@endif

												>{{ $type['text'] }}</option>
											@endforeach
										@endif
									</select>
								</div>
							</td>
							<td>
								<div class="form-group">
									<input type="hidden" name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_fac]" class="form-control faculty" value="{{ $sched[$courseIds[$i]."-lab"][$outer]["lab_fac"] }}" 
										@if (isset($pending))
											{{ isset($sched[$courseIds[$i]."-lab"][0]["pending"]) ? "" : "disabled" }}
										@endif
									>
									@php
										$faculty = $sched[$courseIds[$i]."-lab"][$outer]["lab_fac"];
										if($faculty != "TBA"){
											$pi1 = \App\Pi1::where('id', $faculty)->first();
											$faculty = "{$pi1->surname}, {$pi1->firstname} {$pi1->middlename}";
										}
									@endphp
									<input list="faculties" value="{{ $faculty }}" class="form-control faculty-placeholder" onchange="checkFac(this)" placeholder="Faculty">
									<label class="customError" style="display:none">The faculty has conflict </label>
									{{-- <select name="{{ $sched[$courseIds[$i]]["course"]["id"] }}-lab[{{ $outer }}][lab_fac]" class="form-control faculty {{ isset($sched[$courseIds[$i]."-lab"][0]["pending"]) ? " chosen-select-width chosen-select" : "" }}"

									@if (isset($pending))
										{{ isset($sched[$courseIds[$i]."-lab"][0]["pending"]) ? "" : "disabled" }}
									@endif
									>
										<option value="TBA" {{ "TBA" == $sched[$courseIds[$i]."-lab"][$outer]["lab_fac"] ? "selected" : "" }}>TBA</option>
										@foreach ($teachingFaculties as $teachingFaculty)
											<option value="{{ $teachingFaculty->personnelInfo['id'] }}" {{ $teachingFaculty->personnelInfo['id'] == $sched[$courseIds[$i]."-lab"][$outer]["lab_fac"] ? "selected" : "" }}>{{ $teachingFaculty->personnelInfo['surname'] }}, {{ $teachingFaculty->personnelInfo['firstname'] }} {{ $teachingFaculty->personnelInfo['middlename'] }}</option>
										@endforeach
									</select> --}}
								</div>
							</td>
							<td></td>
							<td id="action">
								@if ($outer > 0)
									<div class="form-group">
										<button type="button" class="btn btn-danger remove" onclick="minus({{ $sched[$courseIds[$i]]["course"]["id"] }},'lab',{{ $outer }})">-</button>
									</div>
								@else
									<div class="form-group">
										<button type="button" class="btn btn-primary plus" onclick="add({{ $sched[$courseIds[$i]]["course"]["id"] }},'lab')">+</button>
									</div>
								@endif
							</td>
						</tr>
					@endif
				@endforeach
			@endif
		@endfor
		
	</tbody>
</table>

<datalist id="faculties">
	<option value="TBA" data-value="TBA">TBA</option>
		@foreach ($teachingFaculties as $teachingFaculty)
			<option value="{{ $teachingFaculty->personnelInfo['surname'] }}, {{ $teachingFaculty->personnelInfo['firstname'] }} {{ $teachingFaculty->personnelInfo['middlename'] }}">{{ $teachingFaculty->personnelInfo['id'] }}</option>
		@endforeach
</datalist>