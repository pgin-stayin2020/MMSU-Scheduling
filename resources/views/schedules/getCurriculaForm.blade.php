	@foreach ($curriculaYss as $curriculaYs)
	@php
		$curriculaDetails = $curriculaYs->curriculaDetails;
	@endphp
	
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
						<input type="checkbox"  id="checkAll" checked>Generate All
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
	@foreach ($curriculaDetails as $curriculaDetail)
		@php
			$lab_unit = $curriculaDetail->course->lab_unit;
		@endphp
		<tr id="{{ $curriculaDetail->course->id }}-lec-0">
			<td  nowrap>{{ $curriculaDetail->course->code }} {{ $lab_unit != 0 ? " LEC" : "" }}</td>
			<td nowrap>{{ $curriculaDetail->course->title }}</td>
			<td>{{ $request["section"] }}</td>
			<td>{{ $curriculaDetail->course->lecture_units }}</td>
			<td>{{ $curriculaDetail->course->lecture_hours }}</td>
			<td>
				<div class="form-group">
					<input type="checkbox" name="{{ $curriculaDetail->course->id }}[0][lec_generate]" class="generate" value="true" checked>
				</div>
			</td>
			<td>
				<div class="form-group">
					<select name="{{ $curriculaDetail->course->id }}[0][lec_fr]" class="form-control from" onchange="checkTime(this)">
						<option value="">-- Time --</option>
						<option value="TBA">TBA</option>
						@foreach ($timeCodes as $timeCode)
							<option value={{ $timeCode->id }}>{{ $timeCode->time }}</option>
						@endforeach
					</select>
					
					<div class="invalid-feedback">
						
					</div>

				</div>
			</td>
			<td>
				<div class="form-group">
					<select name="{{ $curriculaDetail->course->id }}[0][lec_to]" class="form-control to" onchange="checkTime(this)">
						<option value="">-- Time --</option>
						<option value="TBA">TBA</option>
						@foreach ($timeCodes as $timeCode)
							<option value={{ $timeCode->id }}>{{ $timeCode->time }}</option>
						@endforeach
					</select>

					<div class="invalid-feedback">
						
					</div>

				</div>
			</td>
			<td style="min-width: 300px">
				<div class="form-group" class = "days">
					<label class="checkbox-inline">
						<input type="checkbox" name="{{ $curriculaDetail->course->id }}[0][lec_day][]" value="M" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lec',this)">M
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="{{ $curriculaDetail->course->id }}[0][lec_day][]" value="T" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lec',this)">T
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="{{ $curriculaDetail->course->id }}[0][lec_day][]" value="W" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lec',this)">W
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="{{ $curriculaDetail->course->id }}[0][lec_day][]" value="Th" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lec',this)">Th
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="{{ $curriculaDetail->course->id }}[0][lec_day][]" value="F" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lec',this)">F
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="{{ $curriculaDetail->course->id }}[0][lec_day][]" value="S" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lec',this)">S
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="{{ $curriculaDetail->course->id }}[0][lec_day][]" value="Sn" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lec',this)">Sn
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="{{ $curriculaDetail->course->id }}[0][lec_day][]" value="TBA" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lec',this)">TBA
					</label>
					<div class="invalid-feedback">
						Total hours does not add up to the hours needed.
					</div>
				</div>
			</td>
			<td>
				<div class="form-group">
					<select name="{{ $curriculaDetail->course->id }}[0][lec_bldg]" onchange="setRooms({{ $curriculaDetail->course->id }},'lec',this)" class="form-control bldg">
						<option value="">Building</option>
						<option value="TBA">TBA</option>
						@foreach ($bldgs as $bldg)
							<option value="{{ $bldg->id }}">{{ $bldg->bldg }}</option>
						@endforeach
					</select>
				</div>
			</td>
			<td>
				<div class="form-group">
					<select name="{{ $curriculaDetail->course->id }}[0][lec_room]" class="form-control room" onchange="checkRoom(this)">
						{{-- <option value="">Room</option>
						<option value="TBA">TBA</option>
						@foreach ($bldgs as $bldg)
							<optgroup label="{{ $bldg->bldg }}"></optgroup>
							@foreach ($bldg->rooms as $room)
								<option value="{{ $room->id }}">{{ $room->number }}</option>
							@endforeach
						@endforeach --}}
					</select>
					<label class="customError" style="display:none">The room has conflict </label>
				</div>
			</td>

			<td>
				<div class="form-group">
					<select name="{{ $curriculaDetail->course->id }}[0][lec_type]" class="form-control type">
						<option value=1>Lecture</option>
					</select>
				</div>
			</td>
			<td nowrap>
				<div class="form-group">
					<input type="hidden" value="TBA" name="{{ $curriculaDetail->course->id }}[0][lec_fac]" class="form-control faculty" >

					<input list="faculties" value="TBA" class="form-control faculty-placeholder" onchange="checkFac(this)" placeholder="Faculty">

					<label class="customError" style="display:none">The faculty has conflict </label>
					{{-- <select name="{{ $curriculaDetail->course->id }}[0][lec_fac]" class="form-control faculty chosen-select-width chosen-select">
						<option value="TBA">TBA</option>
						@foreach ($teachingFaculties as $teachingFaculty)
							<option value="{{ $teachingFaculty->personnelInfo['id'] }}">{{ $teachingFaculty->personnelInfo['surname'] }}, {{ $teachingFaculty->personnelInfo['firstname'] }} {{ $teachingFaculty->personnelInfo['middlename'] }}</option>
						@endforeach
					</select> --}}
				</div>
			</td>
			<td>
				<div class="form-group">
					<select name="{{ $curriculaDetail->course->id }}[0][lec_dept]" class="form-control chosen-select-width chosen-select department">
						@php
							$depts = \App\Departments::all();
						@endphp
						
						@foreach($depts as $dept)
							<option value="{{ $dept->id }}">{{ $dept->department }}</option>
						@endforeach

					</select>
				</div>
			</td>
			<td id="action">
				<div class="form-group">
					<button type="button" class="btn btn-primary plus" onclick="add({{ $curriculaDetail->course->id }},'lec')">+</button>
				</div>
			</td>
		</tr>
		{{-- LABORATORY --}}
		@if($lab_unit != 0)
			<tr id="{{ $curriculaDetail->course->id }}-lab-0" class="lab">
				<td  nowrap>{{ $curriculaDetail->course->code }} {{ $lab_unit != 0 ? " LAB" : "" }}</td>
				<td nowrap>{{ $curriculaDetail->course->title }}</td>
				<td>{{ $request["section"] }}</td>
				<td>{{ $curriculaDetail->course->lab_unit }}</td>
				<td>{{ $curriculaDetail->course->lab_hours }}</td>
				<td>
					<div class="form-group">
						<input type="checkbox" name="{{ $curriculaDetail->course->id }}-lab[0][lab_generate]" class="generate" value="true" checked>
					</div>
				</td>
				<td>
					<div class="form-group">
						<select name="{{ $curriculaDetail->course->id }}-lab[0][lab_fr]" class="form-control from labfrom"  onchange="checkTime(this,'lab')">
							<option value="">-- Time --</option>
							<option value="TBA">TBA</option>
							@php
								$labTimes = array(
									array('id' => 3, 'time' => "8:00 AM"),
									array('id' => 9, 'time' => "11:00 AM"),
									array('id' => 15, 'time' => "2:00 PM"),
								);
							@endphp
							@foreach ($labTimes as $labTime)
								<option value={{ $labTime['id'] }}>{{ $labTime['time'] }}</option>
							@endforeach
						</select>

					</div>
				</td>
				<td>
					<div class="form-group">
						<select name="{{ $curriculaDetail->course->id }}-lab[0][lab_to]" class="form-control to labto"  onchange="checkTime(this, 'lab')">
							<option value="">-- Time --</option>
							<option value="TBA">TBA</option>
							@php
								$labTimes = array(
									array('id' => 9, 'time' => "11:00 AM"),
									array('id' => 15, 'time' => "2:00 PM"),
									array('id' => 21, 'time' => "5:00 PM"),
								);
							@endphp
							@foreach ($labTimes as $labTime)
								<option value={{ $labTime['id'] }}>{{ $labTime['time'] }}</option>
							@endforeach
						</select>
					</div>
				</td>
				<td style="min-width: 300px">
					<div class="form-group" id="days">
							<label class="checkbox-inline">
								<input type="checkbox" name="{{ $curriculaDetail->course->id }}-lab[0][lab_day][]" value="M" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lab',this)">M
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="{{ $curriculaDetail->course->id }}-lab[0][lab_day][]" value="T" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lab',this)">T
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="{{ $curriculaDetail->course->id }}-lab[0][lab_day][]" value="W" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lab',this)">W
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="{{ $curriculaDetail->course->id }}-lab[0][lab_day][]" value="Th" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lab',this)">Th
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="{{ $curriculaDetail->course->id }}-lab[0][lab_day][]" value="F" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lab',this)">F
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="{{ $curriculaDetail->course->id }}-lab[0][lab_day][]" value="S" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lab',this)">S
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="{{ $curriculaDetail->course->id }}-lab[0][lab_day][]" value="Sn" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lab',this)">Sn
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="{{ $curriculaDetail->course->id }}[0][lab_day][]" value="TBA" class="day" onclick="checkHour({{ $curriculaDetail->course->id }}, 'lab',this)">TBA
							</label>
						<div class="invalid-feedback">
							The faculty has conflict at that time.
						</div>
					</div>
				</td>
				<td>
					<div class="form-group">
						<select name="{{ $curriculaDetail->course->id }}-lab[0][lab_bldg]" onchange="setRooms({{ $curriculaDetail->course->id }}, 'lab', this)" class="form-control bldg" >
							<option value="">Building</option>
							<option value="TBA">TBA</option>
							@foreach ($bldgs as $bldg)
								<option value="{{ $bldg->id }}">{{ $bldg->bldg }}</option>
							@endforeach
						</select>
					</div>
				</td>
				<td>
					<div class="form-group">
						<select name="{{ $curriculaDetail->course->id }}-lab[0][lab_room]" class="form-control room" onchange="checkRoom(this)">
		
						</select>
					</div>
					<label class="customError" style="display:none">The room has conflict </label>
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
						@endphp
						<select name="{{ $curriculaDetail->course->id }}-lab[0][lab_type]" class="form-control type" >
							
							@if (in_array($curriculaDetail->course->course_type_id, $compLab))
								<option value=4>Computer Lab</option>
							@else
								@php
									$lecLab = \App\LecLab::where('course_id', $curriculaDetail->course->id)->where('type', 2)->first();
								@endphp

								@foreach($types as $type)
									<option value={{ $type['value'] }} 

									@if (!empty($lecLab))
										{{ $type['value'] == $lecLab->course_type ? "selected": "" }}
									@endif

									>{{ $type['text'] }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</td>
				<td nowrap>
					<div class="form-group">
						<input type="hidden" value="TBA" name="{{ $curriculaDetail->course->id }}-lab[0][lab_fac]" class="form-control faculty" >
						<input list="faculties" value="TBA" class="form-control faculty-placeholder" onchange="checkFac(this)" placeholder="Faculty">
						
						<label class="customError" style="display:none">The faculty has conflict </label>
						
						{{-- <select name="{{ $curriculaDetail->course->id }}-lab[0][lab_fac]" class="form-control faculty chosen-select-width chosen-select">
							<option value="TBA">TBA</option>
							@foreach ($teachingFaculties as $teachingFaculty)
								<option value="{{ $teachingFaculty->personnelInfo['id'] }}">{{ $teachingFaculty->personnelInfo['surname'] }}, {{ $teachingFaculty->personnelInfo['firstname'] }} {{ $teachingFaculty->personnelInfo['middlename'] }}</option>
							@endforeach
						</select> --}}
					</div>
				</td>
				<td>
					
				</td>
				<td id="action">
					<div class="form-group">
						<button type="button" class="btn btn-primary plus" onclick="add({{ $curriculaDetail->course->id }},'lab')">+</button>
					</div>
				</td>
			</tr>
		@endif
	@endforeach
		</tbody>
	</table>

@endforeach

<datalist id="faculties">
	<option value="TBA" data-value="TBA">TBA</option>
		@foreach ($teachingFaculties as $teachingFaculty)
			<option value="{{ $teachingFaculty->personnelInfo['surname'] }}, {{ $teachingFaculty->personnelInfo['firstname'] }} {{ $teachingFaculty->personnelInfo['middlename'] }}">{{ $teachingFaculty->personnelInfo['id'] }}</option>
		@endforeach
</datalist>