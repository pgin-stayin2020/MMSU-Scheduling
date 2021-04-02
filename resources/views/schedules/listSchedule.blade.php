	<table class="table table-inverse">
		<thead>
			<tr>
				<th>Curriculum</th>
				<th>Year</th>
				<th>Sem</th>
				<th>Section</th>
				<th>School Year</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($schedules as $schedule)
				<tr>
					<td>{{ App\Curricula::where('id', $schedule->curricula_id)->first()->description }}</td>
					<td>{{ $schedule->year }}</td>
					<td>{{ $schedule->sem }}</td>
					<td>{{ $schedule->section }}</td>
					<td>{{ App\Cys::where('id', $schedule->cy_id)->first()->cy }}</td>
					@if (isset($report))
						@if ($report == "section")
							<td><button type="button" class="btn btn-primary" onclick="view({{ $schedule->id }})">View</button><button type="button" class="btn btn-primary" onclick="showTable({{ $schedule->id }})">Show Table</button></td>
						@endif
					@else()
						<td><a class="btn btn-success" href="/schedule/edit/{{ $schedule->id }}" role="button">Edit</a><button type="button" class="btn btn-primary" onclick="view({{ $schedule->id }})">View</button><button type="button" class="btn btn-danger" onclick="deleteSched({{ $schedule->id }})">Delete</button></td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
