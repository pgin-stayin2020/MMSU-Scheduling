@extends('layouts.main')

@section('title')
	Generate Room Schedule Report - Scheduling System
@endsection

@section('style')

@endsection

@section('content')
	<h1 class="header">Generate Room Schedule Report</h1>
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
							
							<label for="curricula" class="form-label col-sm-2">Building:</label>
							<div class="col-sm-2">
								<div class="form-group">
									<select class="form-control chosen-select chosen-select-width" name="bldg" id="bldg">
										@foreach ($bldgs as $bldg)
											<option value="{{ $bldg->id }}">{{ $bldg->bldg }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<label for="curricula" class="form-label col-sm-2">Room Type:</label>
							<div class="col-sm-2">
								<div class="form-group">
									@php
										$types = array(
											array("value" => "all", "text" => "All"),
											array("value" => 1, "text" => "Lecture"),
											array("value" => 4, "text" => "Computer Lab"),
											array("value" => 5, "text" => "Biology Lab"),
											array("value" => 6, "text" => "Chemistry Lab"),
											array("value" => 7, "text" => "Physics Lab"),
											array("value" => 8, "text" => "Speech Lab"),
										);
									@endphp
									<select class="form-control chosen-select chosen-select-width" name="roomType" id="roomType">
										@foreach($types as $type)
											<option value="{{ $type['value'] }}">{{ $type['text'] }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<label for="curricula" class="form-label col-sm-2">Room:</label>
							<div class="col-sm-2">
								<div class="form-group">
									<select class="form-control chosen-select chosen-select-width" name="room" id="room">
										
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

							<label for="sem" class="form-label col-sm-2">Sem:</label>
							<div class="col-sm-4">
								<div class="form-group">
									<select class="form-control" name="sem" id="sem">
										
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<input type="submit" class="btn btn-primary" id="view" value="View">
								<input type="submit" class="btn btn-primary" id="showTable" value="Show Table">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

		
	</div>

	<div class="modal fade" id="report-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Report</h5>
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
					<a class="btn btn-primary" href="" role="button" id="print" name="print" target="_blank">Print</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="table-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Report</h5>
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
					<a class="btn btn-primary" href="" role="button" id="print" name="print" target="_blank">Print</a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>
	$(document).ready(function(){
		//$('body').loadingModal({text: 'Loading...', 'animation': 'wanderingCubes'});
		
		getSem();
		setRooms();
		var config = {
			'.chosen-select'           : {},
			'.chosen-select-deselect'  : {allow_single_deselect:true},
			'.chosen-select-no-single' : {disable_search_threshold:10},
			'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
			'.chosen-select-width'     : {width:"100%"}
		}

		$("#bldg").change(function(){
			setRooms();
		});

		$("#roomType").change(function(){
			setRooms();
		});

		for (var selector in config) {
			$(selector).chosen(config[selector]);
		}
			

		$("#searchSchedules-submit").click(function(event){
			event.preventDefault();
			display();
		});

		$("#print").click(function(){

		})

		$("#view").click(function(event){
			event.preventDefault();
			bldg = $("#bldg").val();
			room = $("#room").val();
			sem = $("#sem").val();
			cy = $("#cy").val();
			roomType = $("#roomType").val();
			// url = '/print/?room='+room+'&sem='+sem+'&cy='+cy;
			// $("#print").attr('href', url);

			formData = $("#searchSchedules-form").serializeArray();

			$("#report-modal .modal-body .table-responsive").load("/schedule/displayRoomSchedule", formData, function(){

				$("#report-modal #print").attr('href', '/print/?type=normal&bldg='+bldg+'&roomType='+roomType+'&room='+room+'&cy='+cy+'&sem='+sem);

				$("#report-modal").modal('show');

			});
		})

		$("#showTable").click(function(event){
			event.preventDefault();

			bldg = $("#bldg").val();
			room = $("#room").val();
			sem = $("#sem").val();
			cy = $("#cy").val();
			roomType = $("#roomType").val();

			formData = $("#searchSchedules-form").serializeArray();

			$("#table-modal .modal-body .table-responsive").load("/schedule/displayRoomScheduleTable", formData, function(){

				$("#table-modal #print").attr('href', '/print/?type=table&bldg='+bldg+'&roomType='+roomType+'&room='+room+"&cy="+cy+"&sem="+sem);

				$("#table-modal").modal('show');

				fill_table();
			});
		})

		$("#section").ready(function(){
			for (var i = 65; i <= 90; i++) {
				$('#section').append('<option>' + String.fromCharCode(i) + '</option>');
			}
		});

	});

	function fill_table(){
		formData = $("#searchSchedules-form").serializeArray();
		formData.push({name: 'type', value: 'room'});
		$.post('/schedule/fillTable', formData, function(result){
			$.each(JSON.parse(result), function(i,valI){
				$.each(valI, function(j,valJ){
					console.log(valJ);
					$.each(valJ.day, function(d,vald){
						rowspan = Math.abs(parseInt(valJ.fr_id) - parseInt(valJ.to_id));
						$("."+valJ.room_id +" ."+valJ.fr_id+"-"+vald).attr("rowspan", rowspan);
						$("."+valJ.room_id +" ."+valJ.fr_id+"-"+vald).html(function(){
							html = "";
							var faculty = "";
							if(valJ.faculty != null){
								faculty = valJ.faculty.firstname+" "+valJ.faculty.surname
							}else{
								faculty = "TBA";
							}
							html += "<p><b>"+valJ.course.code+"</b></p>"+
									"<p>"+valJ.bldg.bldg+"</p>"+
									"<p>"+valJ.room.number+"</p>"+
									"<p>"+faculty+"</p>";
							return html;
						});
						for (var i = valJ.fr_id+1; i < valJ.fr_id+rowspan; i++) {
								console.log(vald);
								console.log(i);
							
							$("."+valJ.room_id +" [class='"+i+"-"+vald+"']").remove();
						}
					})
				})
			})
		})
	}

	function setRooms(){
		bldg = $("#bldg").val();
		roomType = $("#roomType").val();
		$("#room").load('/schedule/setRooms', {'_token' : $("[name=_token]").val(), 'bldg_id' : bldg, 'roomType' : roomType}, function(){
			$("#room").trigger("chosen:updated");
		});

	}

	function getSem(){
		$("#sem").html(function(){
			var html = "";
			for (var i = 1; i <= 3; i++) {
				html += ('<option value="'+i+'"">' + i + '</option>');
			}
			return html;
		});
	}
	</script>
@endsection