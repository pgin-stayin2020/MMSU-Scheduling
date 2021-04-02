@extends('layouts.main')

@section('title')
	Generate Section Report - Scheduling System
@endsection

@section('style')

@endsection

@section('content')
	<h1 class="header">Generate Section Report</h1>
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
									<select class="form-control chosen-select chosen-select-width" name="curricula_id" id="curricula_id">
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
								<input type="submit" class="btn btn-primary" id="view" value="View">
								<input type="submit" class="btn btn-primary" id="showTable" value="Show Table">
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
					<a type="button" class="btn btn-primary" id="print" >Print</a>
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
					<a class="btn btn-primary" href="" role="button" id="print" name="print" >Print</a>
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

		$("#view").click(function(event){
			event.preventDefault();
			curricula_id = $("#curricula_id").val();
			year = $("#year").val();
			sem = $("#sem").val();
			cy = $("#cy").val();
			formData = $("#searchSchedules-form").serializeArray();

			$("#report-modal .modal-body .table-responsive").load("/schedule/displaySectionSchedule", formData, function(){

				$("#report-modal #print").attr('href', '/print/?type=normal&section=true&curricula_id='+curricula_id+'&year='+year+'&cy='+cy+'&sem='+sem);

				$("#report-modal").modal('show');

			});
		});

		$("#showTable").click(function(event){
			event.preventDefault();

			curricula_id = $("#curricula_id").val();
			year = $("#year").val();
			sem = $("#sem").val();
			cy = $("#cy").val();

			formData = $("#searchSchedules-form").serializeArray();

			$("#table-modal .modal-body .table-responsive").load("/schedule/displaySectionScheduleTable", formData, function(){

				$("#table-modal #print").attr('href', '/print/?type=table&section=true&curricula_id='+curricula_id+'&year='+year+'&cy='+cy+'&sem='+sem);

				$("#table-modal").modal('show');
				fill_table();
			});
		});

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

	function fill_table(){
		formData = $("#searchSchedules-form").serializeArray();
		formData.push({name: 'type', value: 'section'});
		$.post('/schedule/fillTable', formData, function(result){
			$.each(JSON.parse(result), function(i,valI){
				$.each(valI, function(j,valJ){
					console.log(valJ);
					$.each(valJ.day, function(d,vald){
						rowspan = Math.abs(parseInt(valJ.fr_id) - parseInt(valJ.to_id));
						$("."+valJ.schedule_id +" ."+valJ.fr_id+"-"+vald).attr("rowspan", rowspan);
						$("."+valJ.schedule_id +" ."+valJ.fr_id+"-"+vald).html(function(){
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
							
							$("."+valJ.schedule_id +" [class='"+i+"-"+vald+"']").remove();
						}
					})
				})
			})
		})
	}

	function display(){
		formData = $("#searchSchedules-form").serializeArray();
		formData.push({
			name: "report",
			value: "section"
		});
		$("#viewSchedules-div").load('/schedule/listSchedule', formData);
	}

	function view(id) {
		$("#report-modal .modal-body .table-responsive").load("/schedule/displaySchedule",{ '_token' : $("[name=_token]").val(), 'schedule_id' : id}, function(){

			$("#report-modal #print").attr('href', '/print/?type=normal&id='+id);

			$("#report-modal").modal('show');

		});
	}

	function showTable(id){
		$("#table-modal .modal-body .table-responsive").load("/schedule/displayScheduleTable",{ '_token' : $("[name=_token]").val(), 'schedule_id' : id}, function(){

			$("#table-modal #print").attr('href', '/print/?type=table&id='+id);
			fill_table_1b1(id);
			$("#table-modal").modal('show');

		});
	}

	function fill_table_1b1(id){
		$.post('/schedule/fillTable', { '_token' : $("[name=_token]").val(), 'schedule_id' : id, 'type' : '1b1'}, function(result){
			$.each(JSON.parse(result), function(i,valI){
				$.each(valI, function(j,valJ){
					console.log(valJ);
					$.each(valJ.day, function(d,vald){
						rowspan = Math.abs(parseInt(valJ.fr_id) - parseInt(valJ.to_id));
						$("."+valJ.schedule_id +" ."+valJ.fr_id+"-"+vald).attr("rowspan", rowspan);
						$("."+valJ.schedule_id +" ."+valJ.fr_id+"-"+vald).html(function(){
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
							
							$("."+valJ.schedule_id +" [class='"+i+"-"+vald+"']").remove();
						}
					})
				})
			})
		})
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
	</script>
@endsection