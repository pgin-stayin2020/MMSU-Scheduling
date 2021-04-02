	<table class="table table-inverse">
		<thead>
			<tr>
				<th>Curriculum</th>
				<th>Year</th>
				<th>Sem</th>
				<th>Section</th>
				<th>School Year</th>
				<th>Status</th>
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
					<td>{{ $schedule->status == 0 ? "Not Finalized" : "Finalized" }}</td>
					<td><button type="button" class="btn btn-primary" onclick="view({{ $schedule->id }})">View</button>
						@if(Auth::user()->designation == 3)
							<button type="button" class="btn btn-success" onclick="prompt({{ $schedule->id }})">Finalize</button>
						@endif

					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
