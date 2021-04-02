@if(Auth::user())
	@if(Auth::user()->designation == 1)
		<h4>Department:</h4>
		{{ Auth::user()->degree->degree }}
	@endif
@endif