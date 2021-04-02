@extends('layouts.main')

@section('title')
View Schedules Page - Scheduling System
@endsection

@section('style')

@endsection

@section('content')
	<h1 class="header">View Schedules</h1>
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

							<label for="curricula" class="form-label col-sm-2">Degree:</label>
							<div class="col-sm-4">
								<div class="form-group">
									<select class="form-control chosen-select chosen-select-width" name="dept_id" id="dept_id">
										@foreach ($users as $user)
										<option value="{{ $user->id }}">{{ $user->name }}</option>
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
				Are you sure you want to approve this schedule?
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

		var config = {
			'.chosen-select'           : {},
			'.chosen-select-deselect'  : {allow_single_deselect:true},
			'.chosen-select-no-single' : {disable_search_threshold:10},
			'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
			'.chosen-select-width'     : {width:"100%"}
		}

		for (var selector in config) {
			$(selector).chosen(config[selector]);
		}

		$("#searchSchedules-submit").click(function(event){
			event.preventDefault();
			search();

		});

		$("#section").ready(function(){
			for (var i = 65; i <= 90; i++) {
				$('#section').append('<option>' + String.fromCharCode(i) + '</option>');
			}
		});

		$("#yes").click(function(){
			id = $("#yes").val();
			$.post('/approve', { '_token' : $("[name=_token]").val(),'schedule_id' : id}, function(result){
				if(result == 0){
					$("#remarks-modal .modal-body").html("Successful.");
				}else{
					$("#remarks-modal .modal-body").html("There was an error.");
				}
				$("#remarks-modal").modal("show");
			})
		})

		$("#remarks-modal").on("hidden.bs.modal", function () {
		    search();
		});

	});

	function search(){
		formData = $("#searchSchedules-form").serializeArray();
		$("#viewSchedules-div").load('/schedule/listViewSchedule', formData);
	}

	function view(id) {
		$("#viewSchedule-modal .modal-body .table-responsive").load("/schedule/displaySchedule",{ '_token' : $("[name=_token]").val(), 'schedule_id' : id}, function(){

			$("#viewSchedule-modal").modal('show');
		});
	}

	function prompt(id){
		$("#areYouSure-modal").modal('show');
		$("#yes").val(id);
	}
	</script>
@endsection