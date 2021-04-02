@extends('layouts.main')

@section('title')
View Schedules Page - Scheduling System
@endsection

@section('style')

@endsection

@section('content')
	<h1 class="header">Schedules</h1>
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
		{{ csrf_field() }}
		<div id="viewSchedules-div">
			
		</div>
	</div>

<div class="modal fade" id="remarks-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Remarks</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="viewSchedule-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">View Schedule</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="areYouSure-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">View Schedule</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure you want to delete this schedule?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" data-dismiss="modal" id="yes" value="">Yes</button>
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
		
		$("#searchSchedules-submit").click(function(event){
			event.preventDefault();
			display();

		});

		$("#section").ready(function(){
			for (var i = 65; i <= 90; i++) {
				$('#section').append('<option>' + String.fromCharCode(i) + '</option>');
			}
		});

		$("#year").on('change',function(){
			getSem();
		});

		$("#yes").click(function(){
			id = $("#yes").val();
			$.post('/schedule/delete', { '_token' : $("[name=_token]").val(), 'schedule_id' : id }, function(result){
				if(result == 0){
					$("#remarks-modal .modal-body").html("Successful.");
				}else{
					$("#remarks-modal .modal-body").html("There was an error.");
				}
				$("#remarks-modal").modal("show");
				display();
			});
		});

	});

	function display(){
		formData = $("#searchSchedules-form").serializeArray();
		$("#viewSchedules-div").load('/schedule/listSchedule', formData)
	}

	function getYear(){
		formData = $("#searchSchedules-form").serializeArray();
		$.post("/schedule/year", formData, function(result){
			var html = "<option value='all'>All</option>";
			for(var i = 1; i <= result; i++){
				html += "<option value="+i+">"+i+"</option>";
			}
			$("#year").html(html);
			display();
		});
	}

	function getSem(){
		$("#sem").html(function(){
			var html = "";
			html+= ('<option value="all">All</option>')
			for (var i = 1; i <= 3; i++) {
				html += ('<option value="'+i+'"">' + i + '</option>');
			}
			return html;
		});
	}

	function view(id) {
		$("#viewSchedule-modal .modal-body .table-responsive").load("/schedule/displaySchedule",{ '_token' : $("[name=_token]").val(), 'schedule_id' : id}, function(){

			$("#viewSchedule-modal").modal('show');

		});
	}

	function deleteSched(id){
		$("#areYouSure-modal").modal('show');
		$("#areYouSure-modal #yes").val(id);
	}
	</script>
@endsection