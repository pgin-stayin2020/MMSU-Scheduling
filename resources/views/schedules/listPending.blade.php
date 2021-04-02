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
			@foreach ($schedules as $pendingSchedule)
			@php
				$schedule = $pendingSchedule->schedule;
			@endphp
				<tr>
					<td>{{ App\Curricula::where('id', $schedule->curricula_id)->first()->description }}</td>
					<td>{{ $schedule->year }}</td>
					<td>{{ $schedule->sem }}</td>
					<td>{{ $schedule->section }}</td>
					<td>{{ App\Cys::where('id', $schedule->cy_id)->first()->cy }}</td>
					<td><a class="btn btn-success" href="/schedule/pending/{{ $schedule->id }}" role="button">Edit</a>
				</tr>
			@endforeach
		</tbody>
	</table>
