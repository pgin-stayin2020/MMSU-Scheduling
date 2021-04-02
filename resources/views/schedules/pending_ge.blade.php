@extends('layouts.main')

@section('title')
Peding GE Courses - Scheduling System
@endsection

@section('style')

@endsection

@section('content')
	<h1 class="header">Peding GE Courses</h1>
	<div class="col">
		<h4 class="schedule-header">Search:</h4>
		<div class="card">
			<div class="card-header">
				<h5>Filters</h5>
			</div>
			<div class="card-block">
				<form action="#" id="searchSchedules-form" class="form">
					<div class="container">
						<div class="row">
							{{ csrf_field() }}

							<label for="curricula" class="form-label col-sm-2">Curriculum:</label>
							<div class="col-sm-4">
								<div class="form-group">
									<select class="form-control" name="curricula_id" id="curricula_id">
										@foreach ($curriculas as $curricula)
										<option value="{{ $curricula->id }}">{{ $curricula->description }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<label for="cy" class="form-label col-sm-2">School Year:</label>
							<div class="col-sm-4">
								<div class="form-group">
									<select class="form-control" name="cy" id="cy">
										@foreach ($cys as $cy)
											<option value="{{ $cy->id }}">{{ $cy->cy }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<label for="year" class="form-label col-sm-2">Year:</label>
							<div class="col-sm-4">
								<div class="form-group">
									<select class="form-control" name="year" id="year">
										
									</select>
								</div>
							</div>

							<label for="sem" class="form-label col-sm-2">Sem:</label>
							<div class="col-sm-4">
								<div class="form-group">
									<select class="form-control" name="sem" id="sem">
										
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<input type="submit" class="btn btn-primary" id="searchSchedules-submit" value="Search">
								
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

		<h4 class="schedule-header">List of Schedules</h4>
		
		<div id="viewSchedules-div">
			
		</div>
	</div>

<div id="modals">
	<div class="modal fade" id="viewSchedule">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Schedule</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div id="viewSchedule-div">
						
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
	<script>
	$(document).ready(function(){
		//$('body').loadingModal({text: 'Loading...', 'animation': 'wanderingCubes'});
		
		getYear();
		getSem();
		display();
		$("#searchSchedules-submit").click(function(event){
			event.preventDefault();
			
			display();
		});

		$("#section").ready(function(){
			for (var i = 65; i <= 90; i++) {
				$('#section').append('<option>' + String.fromCharCode(i) + '</option>');
			}
		});

	});

	function display(){
		formData = $("#searchSchedules-form").serializeArray();
		$("#viewSchedules-div").load('/schedule/listPending', formData);
	}

		function getYear(){
			formData = $("#searchSchedules-form").serializeArray();
			$.post("/schedule/year", formData, function(result){
				var html = "<option value=''>All</option>";
				for(var i = 1; i <= result; i++){
					html += "<option value="+i+">"+i+"</option>";
				}
				$("#year").html(html);
			});
		}

		function getSem(){
			$("#sem").html(function(){
				var html = "";
				html+= ('<option value="">All</option>')
				for (var i = 1; i <= 3; i++) {
					html += ('<option value="'+i+'"">' + i + '</option>');
				}
				return html;
			});
		}
	</script>
@endsection