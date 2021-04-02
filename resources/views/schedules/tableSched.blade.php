<table class="table table-inverse table-format">
	<thead>
		<tr>
			<th>Time\Day</th>
			<th>M</th>
			<th>T</th>
			<th>W</th>
			<th>TH</th>
			<th>F</th>
			<th>S</th>
			<th>Sn</th>
		</tr>
	</thead>
	<tbody>
		@for($i = 0; $i < count($timeCodes)-1; $i++)
			<tr>
				<td class="{{ $timeCodes[$i]['id'] }}">{{ $timeCodes[$i]['time'] }}-{{ $timeCodes[$i + 1]['time'] }}</td>
				<td class="{{ $timeCodes[$i]['id'] }}-M"></td>
				<td class="{{ $timeCodes[$i]['id'] }}-T"></td>
				<td class="{{ $timeCodes[$i]['id'] }}-W"></td>
				<td class="{{ $timeCodes[$i]['id'] }}-Th"></td>
				<td class="{{ $timeCodes[$i]['id'] }}-F"></td>
				<td class="{{ $timeCodes[$i]['id'] }}-S"></td>
				<td class="{{ $timeCodes[$i]['id'] }}-Sn"></td>
			</tr>
		@endfor
	</tbody>
</table>