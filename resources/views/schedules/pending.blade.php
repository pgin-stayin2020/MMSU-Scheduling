@extends('layouts.main')

@section('title')
	Edit Pending Schedule - Scheduling System
@endsection

@section('plugin_css')

@endsection

@section('plugin_js')

@endsection

@section('style')
	td > .form-group > .form-control{
		min-width: 200px;
	}
@endsection

@section('content')
<div class="container">

	<form action="/schedule/generate" id="editSchedule-form" class="form">
	<h1 class="header">Edit Pending Schedule</h1>
		<div class="card">
			<div class="card-header">
				<h5>Edit pending schedule of</h5>
			</div>
			<div class="card-block">
					<div class="container">
						<div class="row">
							{{ csrf_field() }}
							<label for="name" class="form-label col-sm-2">Curriculum:</label>
							<div class="col-md-2">
								<div class="form-group">
									<select class="form-control" name="curricula_id" id="curricula_id" required="true" readonly>
										<option value="{{ $schedule->curricula_id }}">{{ App\Curricula::where('id', $schedule->curricula_id)->first()->description }}</option>
									</select>
								</div>
							</div>
							<label for="name" class="form-label col-md-2">Academic Year:</label>
							<div class="col-md-2">
								<div class="form-group">
									<select type="text" class="form-control" readonly>
										<option value="{{ $schedule->cy_id }}">{{ App\Cys::where('id', $schedule->cy_id)->first()->cy }}</option>
									</select>
								</div>
							</div>
							<label for="name" class="form-label col-md-2">Year:</label>
							<div class="col-md-2">
								<div class="form-group">
									<select class="form-control" name="year" id="year" required="true" readonly>
										<option value="{{ $schedule->year }}">{{ $schedule->year }}</option>
									</select>
								</div>
							</div>

							<label for="name" class="form-label col-md-2">Sem:</label>
							<div class="col-md-2">
								<div class="form-group">
									<select class="form-control" name="sem" id="sem" required="true" readonly>
										<option value="{{ $schedule->sem }}">{{ $schedule->sem }}</option>
									</select>
								</div>
							</div>
							<label for="name" class="form-label col-md-2">Section:</label>
							<div class="col-md-2">
								<div class="form-group">
									<select class="form-control" name="section" id="section" required="true" readonly>
										<option value="{{ $schedule->section }}">{{ $schedule->section }}</option>
									</select>
								</div>
							</div>
							
							<label for="size" class="form-label col-md-2">Size:</label>
							<div class="col-md-2">
								<div class="form-group">
									<input type="number" name="size" id="size" value="{{ $schedule->size }}" min=1 max=60 class="form-control" required="true" readonly>
								</div>
							</div>
						</div>
					</div>
				
			</div>
		</div>
		{{-- <div class="table-responsive">
			<form action="#" id="curriculum-form" class="form form-horizontal">

			</form>
		</div> --}}
		<div id="curri-card" class="card" style="display: none">
			<div class="card-header">
				<h5 class="d-inline">Curriculum</h5>
				<button type="button" class="btn btn-primary d-inline" id="tableSched" data-toggle="modal" data-target="#tableSched-modal">Show Table</button>
			</div>
			<div class="card-block">
				<div class="table-responsive">
					<div id="curriculum-form" class="form form-horizontal">
						
					</div>
				</div>
			</div>
		</div>
		{{-- <div id="prio-card" class="card" style="display: none">
			<div class="card-header">
				<h5>Priorities</h5>
			</div>
			<div class="card-block">
					<div class="container">
						<div class="row">
							<div class="col-sm-12"><h4>Lecture</h4></div>
							<label for="name" class="form-label col-sm-2">Building/s:</label>
							<div class="col-sm-4">
								<div class="form-group">
									<select class="form-control chosen-select-width chosen-select" name="bldgs[]" id="bldgs" size="10" multiple required="true">
										@foreach ($bldgs as $bldg)
											<option value="{{ $bldg->id }}">{{ $bldg->bldg }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<label for="name" class="form-label col-sm-2">Room/s:</label>
							<div class="col-sm-4">
								<div class="form-group">
									<select class="form-control chosen-select-width chosen-select" name="rooms[]" id="rooms" size="10" multiple required="true">
										
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12"><h4>Laboratory</h4></div>
							<label for="name" class="form-label col-sm-2">Building/s:</label>
							<div class="col-sm-4">
								<div class="form-group">
									<select class="form-control chosen-select-width chosen-select" name="bldgs_lab[]" id="bldgs_lab" size="10" multiple required="true">
										@foreach ($bldgs as $bldg)
											<option value="{{ $bldg->id }}">{{ $bldg->bldg }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<label for="name" class="form-label col-sm-2">Room/s:</label>
							<div class="col-sm-4">
								<div class="form-group">
									<select class="form-control chosen-select-width chosen-select" name="rooms_lab[]" id="rooms_lab" size="10" multiple required="true">
										
									</select>
								</div>
							</div>
						</div>
					</div>
			</div>
		</div> --}}
		<div id="generate-card" class="card" style="display: none">
			<div class="card-header">
				<h5>Generate Schedule</h5>
			</div>
			<div class="card-block">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								{{-- <button type="button" class="btn btn-primary" id="generate">Generate</button> --}}
								<button type="button" class="btn btn-primary" id="submit">Submit</button>
								<button type="button" class="btn btn-danger" id="checkConflict">Check Conflict/s</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<div id="conflicts">
		<div class="card bg-danger">
			<div class="card-header">
				<p>Conflicts</p>
			</div>
			<div class="card-block">
				None
			</div>
		</div>
		
		<button type="button" id="closeConflict" class="btn btn-danger btn-round float-right">X</button>
	</div>
</div>

<div class="modal fade" id="tableSched-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Table Form</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
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
@endsection

@section('script')
	<script>
		$(function(){
		
			$.validator.setDefaults({
				highlight: function(element){
					$(element)
					.parent()
					.removeClass('is-valid')
					.addClass('is-invalid');
				},
				unhighlight: function(element){
					$(element)
					.parent()
					.removeClass('is-invalid')
					.addClass('is-valid');
				}
			});

			$.validator.addMethod('le', function(value, element, param) {
			      return this.optional(element) || value <= $(param).val();
			}, 'Invalid value');

			$.validator.addMethod('ge', function(value, element, param) {
			      return this.optional(element) || value >= $(param).val();
			}, 'Invalid value');

			$.validator.addMethod("notEqual", function(value, element, param) {
				return this.optional(element) || value != param;
			}, "Please select a Faculty");

			$.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" });
		}
	</script>
	<script>
		schedule_id = {{ $schedule->id }}
		$(document).ready(function(){
			getEditForm();

			$("#bldgs").change(function(){
				bldgs = $("#bldgs").val();
				$("#rooms").load('/schedule/getRooms',{'bldgs' : bldgs, 'type' : 'lec', '_token' : $("[name=_token]").val()}, function(){
				$("#rooms").trigger("chosen:updated");
				});
			});

			$("#bldgs_lab").change(function(){
				bldgs = $("#bldgs_lab").val();
				
				$("#rooms_lab").load('/schedule/getRooms',{'bldgs' : bldgs, 'type' : 'lab', '_token' : $("[name=_token]").val()}, function(){
				$("#rooms_lab").trigger("chosen:updated");
				});
			});

			$("#generate").click(function(event){
				event.preventDefault();
				var elements = ["#bldgs", "#bldgs_lab", "#rooms", "#rooms_lab", ".type"];
				var hasError = false;

				

				$.each(elements, function(index, value){
 					if(!$(value).valid()){
 						hasError = true;
 						return true;
 					}
				})

				alert(hasError);

				if(!hasError){
					generate();
				}
			});

			$("#submit").click(function(event){
				event.preventDefault();

				if ($( "#editSchedule-form" ).valid()) {
					formData = $("#editSchedule-form").serializeArray();
					formData.push({name: 'schedule_id', value: schedule_id});
					$.post('/schedule/pendingSubmit', formData, function(result){
						if(result == 1){
							$("#remarks-modal .modal-body").html("Successful.");
						}else{
							$("#remarks-modal .modal-body").html("There was an error.");
						}
						$("#remarks-modal").modal("show");
					});
				}
			});

			$("#remarks-modal").on("hidden.bs.modal", function () {
			    window.location = "/pending_ge";
			});

		});

		function getEditForm(){
			formData = $("#editSchedule-form").serializeArray();

			formData.push({name: 'schedule_id', value: schedule_id});

			$("#curri-card").hide();

			// $("#prio-card").hide();

			$("#generate-card").hide();

			$('body').loadingModal({text: 'Loading...', 'animation': 'wanderingCubes'});
			$('body').loadingModal("show");
			$("#curriculum-form").load('/schedule/getEditPending', formData, function(){

				$("#curri-card").slideDown();

				// $("#prio-card").slideDown();

				$("#generate-card").slideDown(400, function(){
						$('body').loadingModal("hide");

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

						$(".from").each(function(){
							parentId = $(this).parent().parent().parent().attr("id");
							$.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" });
							$("#editSchedule-form").validate({
								errorPlacement: function(error,element){
									if($(element).attr('class') == 'day error'){
										error.insertAfter($(element).parent().parent())
									}else{
										error.insertAfter($(element).parent())
									}
								}
							});

							$.validator.addMethod('lt', function(value, element, param) {
								if(value != "TBA"){
							    	return this.optional(element) || parseInt(value) < parseInt($(param).val());
								}else{
									return true;
								}
							}, 'From must be earlier than to');

							$.validator.addMethod('gt', function(value, element, param) {
								if(value != "TBA"){
							    	return this.optional(element) || parseInt(value) > parseInt($(param).val());
								}else{
									return true;
								}
							}, 'To must be later than from ');

							$(this).rules("add", {
								lt: "#" + parentId + " .to",
								required: true,
							});

							$("#" + parentId + " .to").rules("add", {
								gt: "#" + parentId + " .from",
								required: true,
							});

							$("#" + parentId + " .day").rules("add", {
								required: true,
							});

							$("#" + parentId + " .bldg").rules("add", {
								required: true,
							});

							$("#" + parentId + " .room").rules("add", {
								required: true,
							});

							$("#" + parentId + " .type").rules("add", {
								required: true,
							});
							$.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" });
							$.validator.addMethod("notEqual", function(value, element, param) {
								return this.optional(element) || value != param;
							}, "Please select a Faculty");
							$("#" + parentId + " .faculty").rules("add", {
								required: true,
								notEqual: "TBA"
							});
						})

						$('body').loadingModal("hide");
						$("#input-table").tableHeadFixer({'left' : 1});
					});
			});
		}
		function generate(){
			createSchedule = $("#editSchedule-form").serializeArray();

			bldgs = $("#bldgs").getSelectionOrder();

			bldgs_lab = $("#bldgs_lab").getSelectionOrder();

			alert(bldgs[0]);

			alert(bldgs_lab[0]);
			bldgsI = 0;
			bldgs_labI = 0;
			$.each(createSchedule, function(i, field){
				
				if(field.name == 'bldgs[]'){
					field.value = bldgs[bldgsI]
					bldgsI++;
				}

				if(field.name == 'bldgs_lab[]'){
					field.value = bldgs_lab[bldgs_labI]
					bldgs_labI++;
				}
		    });

			// createSchedule.push({
			// 	name: "bldgs[]",
			// 	value: $("#bldgs").getSelectionOrder()
			// });

			// createSchedule.push({
			// 	name: "bldgs_lab[]",
			// 	value: $("#bldgs_lab").getSelectionOrder()
			// });

			$('body').loadingModal({text: 'Loading...', 'animation': 'wanderingCubes'});

			$('body').loadingModal('show');

			$("#curri-card").hide();

			$("#prio-card").hide();

			$("#generate-card").hide();

			$("#curriculum-form").load('/schedule/generate', createSchedule, function(){

					$("#curri-card").slideDown();

					$("#prio-card").slideDown();

					$("#generate-card").slideDown(400, function(){
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

						$(".faculty").chosen();

						$('body').loadingModal('hide');
					});

					$("#input-table").tableHeadFixer({'left' : 1});
				});

			// $.post('/schedule/generate', createSchedule, function(result){
			// 	var obj = jQuery.parseJSON(result);
			// 	alert(obj);
			// });
			
		}
	</script>
	{{-- 
	<script>
		$(document).ready(function(){
			
			
			getYear();

			getSem();
			$("#section").ready(function(){
				for (var i = 65; i <= 90; i++) {
				    $('#section').append('<option>' + String.fromCharCode(i) + '</option>');
				}
			});

			$("#bldgs").change(function(){
				bldgs = $("#bldgs").val();
				$("#rooms").load('/schedule/getRooms',{'bldgs' : bldgs, 'type' : 'lec', '_token' : $("[name=_token]").val()}, function(){
				$("#rooms").trigger("chosen:updated");
				});
			});

			$("#bldgs_lab").change(function(){
				bldgs = $("#bldgs_lab").val();
				
				$("#rooms_lab").load('/schedule/getRooms',{'bldgs' : bldgs, 'type' : 'lab', '_token' : $("[name=_token]").val()}, function(){
				$("#rooms_lab").trigger("chosen:updated");
				});
			});

			$("#generate").click(function(event){
				event.preventDefault();
				var elements = ["#bldgs", "#bldgs_lab", "#rooms", "#rooms_lab", ".type"];
				var hasError = false;

				

				$.each(elements, function(index, value){
 					if(!$(value).valid()){
 						hasError = true;
 						return true;
 					}
				})

				alert(hasError);

				if(!hasError){
					generate();
				}
			});

			$("#createSchedule-form").submit(function(event){
				
				
			});

			$("#submit").click(function(event){
				event.preventDefault();

				if ($( "#createSchedule-form" ).valid()) {
					formData = $("#createSchedule-form").serializeArray();
					$.post('/schedule/submit', formData, function(result){
						if(result == 0){
							$("#remarks-modal .modal-body").html("Successful.");
						}else{
							$("#remarks-modal .modal-body").html("There was an error.");
						}
						$("#remarks-modal").modal("show");
						$("#year option[value='']").attr('selected', true);
						$("#sem option[value='']").attr('selected', true);
						getForm();
					});
				}
			});

			$("#checkConflict").click(function(event){
				event.preventDefault();
				checkConflict();
			})

			$("#createSchedule-submit").click(function(event){
				event.preventDefault();
				
			});

			// $("#year").on('change',function(){
			// 	getSem();
			// });

			$("#closeConflict").click(function(){
				$("#conflicts .card").slideToggle("fast");
			})

			$("#tableSched").click(function(){
				formData = $("#createSchedule-form").serializeArray();
				$("#tableSched-modal .modal-body").load('/schedule/tableSched', {'_token' : $("[name='_token']").val()});

				$.post('/schedule/setTableSched', formData, function(result){
					alert(parseJSON(result['']))
				});
			})

		});

		function checkTime(obj){
			parentId = $(obj).parent().parent().parent().attr("id");
			$("#" + parentId + " .from").valid();
			$("#" + parentId + " .to").valid();
		}

		function checkHour(course_id, type,obj){
			// id = $(obj).parent().parent().parent().parent().attr("id");
			// days = [];

			// conflict = 0;

			// if($("#" + id + " #from").val() != "" && $("#" + id + " #to").val() != ""){
			// 	$("#"+id + " #days :checked").each(function() {
			//        days.push($(this).val());
			//     });

			// 	$.post("/schedule/checkHour", {'course_id' : course_id, 'type': type, 'fr': $("#" + id + " #from").val(), 'to': $("#" + id + " #to").val(), days: days, '_token' : $("[name='_token']").val()}, function(result){
						
			// 		if(result == -1){
			// 			$("#"+id + " #days").find(".invalid-feedback").css('display', 'block');
			// 		}else{
			// 			$("#"+id + " #days").find(".invalid-feedback").css('display', 'none');
			// 		}

			// 		conflict = result;

			// 	})
			// }

			// return conflict;

		}

		function getForm(){
			formData = $("#createSchedule-form").serializeArray();
			
			$("#curri-card").hide();

			$("#prio-card").hide();

			$("#generate-card").hide();

			if ($("#curricula_id").val() != "" && $("#year").val() != "" && $("#sem").val() != "" && $("#section").val() != "" && $("#size").val() != "") {
				$('body').loadingModal({text: 'Loading...', 'animation': 'wanderingCubes'});
				$('body').loadingModal("show");
				$("#curriculum-form").load('/schedule/getCurriculaForm', formData, function(){

					$("#curri-card").slideDown();

					$("#prio-card").slideDown();

					$("#generate-card").slideDown(400, function(){

						$(".faculty").chosen();

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

						$(".from").each(function(){
							parentId = $(this).parent().parent().parent().attr("id");
							$.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" });
							$("#createSchedule-form").validate({
								errorPlacement: function(error,element){
									if($(element).attr('class') == 'day error'){
										error.insertAfter($(element).parent().parent())
									}else{
										error.insertAfter($(element).parent())
									}
								}
							});

							$.validator.addMethod('lt', function(value, element, param) {
								if(value != "TBA"){
							    	return this.optional(element) || parseInt(value) < parseInt($(param).val());
								}else{
									return true;
								}
							}, 'From must be earlier than to');

							$.validator.addMethod('gt', function(value, element, param) {
								if(value != "TBA"){
							    	return this.optional(element) || parseInt(value) > parseInt($(param).val());
								}else{
									return true;
								}
							}, 'To must be later than from ');

							$(this).rules("add", {
								lt: "#" + parentId + " .to",
								required: true,
							});

							$("#" + parentId + " .to").rules("add", {
								gt: "#" + parentId + " .from",
								required: true,
							});

							$("#" + parentId + " .day").rules("add", {
								required: true,
							});

							$("#" + parentId + " .bldg").rules("add", {
								required: true,
							});

							$("#" + parentId + " .room").rules("add", {
								required: true,
							});

							$("#" + parentId + " .type").rules("add", {
								required: true,
							});

						})

						$('body').loadingModal("hide");
						$("#input-table").tableHeadFixer({'left' : 1});

					});

					

				});
			}
		}

		function getYear(){
			formData = $("#createSchedule-form").serializeArray();
			$.post("/schedule/year", formData, function(result){
				var html = "<option value=''>Year</option>";
				for(var i = 1; i <= result; i++){
					html += "<option value="+i+">"+i+"</option>";
				}
				$("#year").html(html);
			});
		}

		function getSem(){
			$("#sem").html(function(){
				var html = "";
				html+= ('<option value="">Semester</option>')
				for (var i = 1; i <= 3; i++) {
					html += ('<option value="'+i+'"">' + i + '</option>');
				}
				return html;
			});
		}

		function generate(){
			createSchedule = $("#createSchedule-form").serializeArray();

			bldgs = $("#bldgs").getSelectionOrder();

			bldgs_lab = $("#bldgs_lab").getSelectionOrder();

			alert(bldgs[0]);

			alert(bldgs_lab[0]);
			bldgsI = 0;
			bldgs_labI = 0;
			$.each(createSchedule, function(i, field){
				
				if(field.name == 'bldgs[]'){
					field.value = bldgs[bldgsI]
					bldgsI++;
				}

				if(field.name == 'bldgs_lab[]'){
					field.value = bldgs_lab[bldgs_labI]
					bldgs_labI++;
				}
		    });

			// createSchedule.push({
			// 	name: "bldgs[]",
			// 	value: $("#bldgs").getSelectionOrder()
			// });

			// createSchedule.push({
			// 	name: "bldgs_lab[]",
			// 	value: $("#bldgs_lab").getSelectionOrder()
			// });

			$('body').loadingModal({text: 'Loading...', 'animation': 'wanderingCubes'});

			$('body').loadingModal('show');

			$("#curri-card").hide();

			$("#prio-card").hide();

			$("#generate-card").hide();

			$("#curriculum-form").load('/schedule/generate', createSchedule, function(){

					$("#curri-card").slideDown();

					$("#prio-card").slideDown();

					$("#generate-card").slideDown(400, function(){
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

						$(".faculty").chosen();

						$('body').loadingModal('hide');
					});

					$("#input-table").tableHeadFixer({'left' : 1});
				});

			// $.post('/schedule/generate', createSchedule, function(result){
			// 	var obj = jQuery.parseJSON(result);
			// 	alert(obj);
			// });
			
		}

		function checkConflict(){
			createSchedule = $("#createSchedule-form").serializeArray();

			$.post("/schedule/checkConflict", createSchedule, function(result){
				if(result == ""){
					result = "None";
				}
				$("#conflicts").find('.card-block').html(result);
			});
		}
		function add(id,type){

			name = $("[id^=" + id + '-' + type + '-]:last').attr('id');

			index = name.indexOf("-", name.indexOf("-") + 1);
			index++;
			num = "";

			while(Number.isInteger(parseInt(name[index]))){
				num += name[index];
				index++;
			}

			num = parseInt(num);
			num++;
			var clone_id = id+'-'+type+ '-' +num;
			$("[id^=" + id + '-' + type + '-]:last').clone().attr('id', clone_id).insertAfter("[id^=" + id + '-' + type + '-]:last');
			if(num == 1){
				$("#"+clone_id + " > #action .form-group ").append("<button type='button' class='btn btn-danger remove' onclick=" +'"'+ "minus('"+clone_id+"')" +'"'+ ">-</button>");

				$("#"+clone_id + " " + ".plus").remove();
			}

			
			$("#"+clone_id + " " + ".day").each(function(){
				$(this).attr('name', id+"-lab["+num+"]["+type+"_day][]");
			});

			$("#"+clone_id + " " + ".from").attr('name', id+"-lab["+num+"]["+type+"_fr][]");

			$("#"+clone_id + " " + ".to").attr('name', id+"-lab["+num+"]["+type+"_to][]");

			$("#"+clone_id + " " + ".bldg").attr('name', id+"-lab["+num+"]["+type+"_bldg][]");

			$("#"+clone_id + " " + ".room").attr('name', id+"-lab["+num+"]["+type+"_room][]");

			$("#"+clone_id + " " + ".faculty").attr('name', id+"-lab["+num+"]["+type+"_fac][]");

			$("#"+clone_id + " " + ".remove").attr('onclick', "minus('"+clone_id+"')");
			$("#input-table").tableHeadFixer({'left' : 1});
		}

		function minus(id){
			$("#"+id).remove();
		}

		function setRooms(course_id,type,obj){
			$(obj).parent().parent().next().children().children().html("<option value=''>Loading</option>");

			$(obj).parent().parent().next().children().children().load('/schedule/getRooms', {'course_id' : course_id, 'type' : type, 'bldgs' : $(obj).val(), '_token' : $("[name='_token']").val() });
		}
	</script> --}}
@endsection