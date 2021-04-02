@foreach ($curriculaYss as $curriculaYs)
	<h4>Year: {{ $curriculaYs->year }} </h4>
	<h4>Semester: {{ $curriculaYs->sem }} </h4>
	@php
		$i = 1;
		$curriculaDetails = $curriculaYs->curriculaDetails;
	@endphp
	
	<di class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Course Code</th>
					<th>Course Description</th>
					<th>Units</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($curriculaDetails as $curriculaDetail)
				<tr>
					<td>{{ $i }}</td>
					<td>{{ $curriculaDetail->course->code }}</td>
					<td>{{ $curriculaDetail->course->description }}</td>
					<td>{{ $curriculaDetail->course->units }}</td>
					<td><button type="button" class="btn btn-primary">View</button>
					</td>
				</tr>
				@php
					$i++;
				@endphp
			@endforeach
			</tbody>
		</table>
	</div>
@endforeach