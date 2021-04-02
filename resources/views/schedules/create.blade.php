@extends('layouts.main')

@section('title')
	Create Schedule - Scheduling System
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

	<form action="/schedule/generate" id="createSchedule-form" class="form">
	<h1 class="header">Create Schedule</h1>
		<div class="card">
			<div class="card-header">
				<h5>Create schedule for</h5>
			</div>
			<div class="card-block">
					<div class="container">
						<div class="row">
							{{ csrf_field() }}
							<label for="name" class="form-label col-sm-2">Curriculum:</label>
							<div class="col-md-2">
								<div class="form-group">
									<select class="form-control" name="curricula_id" id="curricula_id" required="true" onchange="getForm()">
										@foreach ($curriculas as $curricula)
											<option value="{{ $curricula->id }}">{{ $curricula->description }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<label for="name" class="form-label col-md-2">Academic Year:</label>
							<div class="col-md-2">
								<div class="form-group">
									<select type="text" id="cy" class="form-control" readonly>
										<option value="{{ $cysObj->id }}">{{ $cysObj->cy }}</option>
									</select>
								</div>
							</div>
							<label for="name" class="form-label col-md-2">Year:</label>
							<div class="col-md-2">
								<div class="form-group">
									<select class="form-control" name="year" id="year" onchange="getForm()" required="true">
									</select>
								</div>
							</div>

							<label for="name" class="form-label col-md-2">Sem:</label>
							<div class="col-md-2">
								<div class="form-group">
									<select class="form-control" name="sem" id="sem" onchange="getForm()" required="true">
									</select>
								</div>
							</div>
							<label for="name" class="form-label col-md-2">Section:</label>
							<div class="col-md-2">
								<div class="form-group">
									<select class="form-control" name="section" id="section" onchange="getForm()">
										
									</select>
									<label class="customError" style="display:none">The section is not available</label>
								</div>
							</div>
							
							<label for="size" class="form-label col-md-2">Size:</label>
							<div class="col-md-2">
								<div class="form-group">
									<input type="number" name="size" id="size" value="15" min=1 max=60 class="form-control" required="true">
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
		<div id="prio-card" class="card" style="display: none">
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
		</div>
		<div id="generate-card" class="card" style="display: none">
			<div class="card-header">
				<h5>Generate Schedule</h5>
			</div>
			<div class="card-block">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<button type="button" class="btn btn-primary" id="generate">Generate</button>
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

			$( "#createSchedule-form" ).validate({
				rules: {
					bldgs: {
						required: true
					},
					bldgs_lab: {
						required: true
					},
					rooms: {
						required: true
					},
					rooms_lab: {
						required: true
					}
				}
			});
		}
	</script>
	<script>
		$(document).ready(function(){
			
			getYear();

			getSem();

			$("#createSchedule-form").validate({
									errorPlacement: function(error,element){
										if($(element).attr('class') == 'day error'){
											error.insertAfter($(element).parent().parent())
										}else{
											error.insertAfter($(element).parent())
										}
									}
								});
			

			$(document).on('change', '#checkAll',function(){
				$(".generate:enabled").prop('checked', $("#checkAll").is(':checked'));
			});

			$(document).on('change', '.generate', function(){
				$("#checkAll").prop('checked',$(".generate:enabled:not(:checked)").length == 0);
			});

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

				if(!hasError){
					generate();
				}
			});

			$("#createSchedule-form").submit(function(event){
				
				
			});

			$("#submit").click(function(event){
				event.preventDefault();

				hasError = false;

				$(".faculty").each(function(){
					obj = $(this);
					if ($(this).val() != "" || $(this).val() != "TBA") {
						if (parseInt(checkFac(obj, true)) == 0) {
							hasError = false;
						}else{
							hasError = true;
							return false;
						}
					}

				})
				hasRoomError = false;
				$(".room").each(function(){
					obj = $(this);
					if ($(this).val() != "" || $(this).val() != "TBA") {
						if (parseInt(checkRoom(obj)) == 0) {
							hasRoomError = false;
						}else{
							hasRoomError = true;
							return false;
						}
					}
				})

				if ($( "#createSchedule-form" ).valid() && !hasError && !hasRoomError && checkConflict() != 1) {
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
				formData.push({name: 'type', value: 'create'});
				$("#tableSched-modal .modal-body").load('/schedule/tableSched', {'_token' : $("[name='_token']").val()});

				$.post('/schedule/fillTable', formData, function(result){
					$.each(JSON.parse(result), function(i, valI){
							
						$.each(valI.day, function(d, vald){

							rowspan = Math.abs(parseInt(valI.fr_id) - parseInt(valI.to_id));
							$("."+valI.fr_id+"-"+vald).attr("rowspan", rowspan);
							$("."+valI.fr_id+"-"+vald).html(function(){
								html = "";
								var faculty = valI.faculty;
								if(valI.faculty != 'TBA'){
									faculty = valI.faculty.firstname+" "+valI.faculty.surname
								}
								course_code = valI.course.code;
								if(valI.type == 'Lab'){
									course_code += '-Lab';
								}
								html += "<p><b>"+course_code+"</b></p>"+
										"<p>"+valI.bldg.bldg+"</p>"+
										"<p>"+valI.room.number+"</p>"+
										"<p>"+faculty+"</p>";

								
								return html;
							});
							for (var i = parseInt(valI.fr_id)+1; i < parseInt(valI.fr_id)+rowspan; i++) {
								$("[class='"+i+"-"+vald+"']").remove();
							}
						})
					})
				});
			})

		});

		function checkSection(){
			res = false;
			$.ajax({
				type: 'post',
				url:'/schedule/checkSection',
				data:{
					'_token': $("[name='_token']").val(),
					year: $("#year").val(),
					sem: $("#sem").val(),
					cy: $("#cy").val(),
					section: $("#section").val(),
					},
				success: function(result){
					if(result == 0){
						$("#section").siblings('.customError').show();
					}else{
						$("#section").siblings('.customError').hide();
					}
					res = result;
				},
				async: false
			});
			return res;
		}

		function checkFac(obj, checking = false){

			parentId = $(obj).parent().parent().parent().attr("id");
			if(!checking){
				$("#"+parentId+" .faculty").val($("#faculties option[value='"+$(obj).val()+"']").html());
			}
			

			var elements = [".from", ".to", ".day"];

			var hasError = false;
			conflict = 0;
			$.each(elements, function(index, value){
				if(!$("#"+parentId+" "+value).valid()){
					hasError = true;
					conflict = 1;
					return true;
				}
			})

			if (!hasError && ($("#" + parentId + " .faculty").val() != "" && $("#" + parentId + " .faculty").val() != "TBA")) {
				days = [];
				$("#" + parentId + " .day:checked").each(function(index, value){
					days.push(value.value);
				})
				
				$.ajax({
					type:'post',
					url:"/schedule/checkFaculty",
					data:{'_token' : $("[name='_token']").val(), 'from' : $("#" + parentId + " .from").val(), 'to' : $("#" + parentId + " .to").val(), 'days[]': days, "faculty" : $("#" + parentId + " .faculty").val(), "sem" : $("#sem").val(), "cy" : $("#cy").val() },
					success:function(result){
							conflict = result
					
							if (result == 0) {
								$("#"+parentId+" .faculty").siblings(".customError").hide();
							}else{
								$("#"+parentId+" .faculty").siblings(".customError").show();
							}
					},
					async:false
				})

				// $.post("/schedule/checkFaculty", {'_token' : $("[name='_token']").val(), 'from' : $("#" + parentId + " .from").val(), 'to' : $("#" + parentId + " .to").val(), 'days[]': days, "faculty" : $("#" + parentId + " .faculty").val(), "sem" : $("#sem").val(), "cy" : $("#cy").val() }, function(result){
				// 		conflict = result
					
				// 		if (result == 0) {
				// 			$("#"+parentId+" .faculty").siblings(".customError").hide();
				// 		}else{
				// 			$("#"+parentId+" .faculty").siblings(".customError").show();
				// 		}
				// 	//return result;
				// })
				
			}
			return conflict;
		}

		function checkRoom(obj){

			parentId = $(obj).parent().parent().parent().attr("id");

			var elements = [".from", ".to", ".day"];

			var hasError = false;

			conflict = 0;

			$.each(elements, function(index, value){
				if(!$("#"+parentId+" "+value).valid()){
					hasError = true;
					conflict = 1;
					return true;
				}
			})

			if (!hasError && ($("#" + parentId + " .room").val() != "" && $("#" + parentId + " .room").val() != "TBA")) {
				days = [];
				$("#" + parentId + " .day:checked").each(function(index, value){
					days.push(value.value);
				})
				
				$.ajax({
					type:'post',
					url:"/schedule/checkRoom",
					data:{'_token' : $("[name='_token']").val(), 'from' : $("#" + parentId + " .from").val(), 'to' : $("#" + parentId + " .to").val(), 'days[]': days, "room" : $("#" + parentId + " .room").val(), "sem" : $("#sem").val(), "cy" : $("#cy").val() },
					success: function(result){
							conflict = result
							if (result == 0) {
								$("#"+parentId+" .room").siblings(".customError").hide();
							}else{
								$("#"+parentId+" .room").siblings(".customError").show();
							}

						//return result
					},
					async: false
				})

				// $.post("/schedule/checkRoom", {'_token' : $("[name='_token']").val(), 'from' : $("#" + parentId + " .from").val(), 'to' : $("#" + parentId + " .to").val(), 'days[]': days, "room" : $("#" + parentId + " .room").val(), "sem" : $("#sem").val(), "cy" : $("#cy").val() }, function(result){
					
				// 		if (result == 0) {
				// 			$("#"+parentId+" .room").siblings(".customError").hide();
				// 		}else{
				// 			$("#"+parentId+" .room").siblings(".customError").show();
				// 		}

				// 	return result;
				// })
				
			}
			return conflict;
			
		}

		function checkTime(obj, type = 'lec'){
			parentId = $(obj).parent().parent().parent().attr("id");

			if($(obj).val() == "TBA"){
				$("#" + parentId + " .from").val("TBA");
				$("#" + parentId + " .to").val("TBA");

			    $("#" + parentId + " .day").each(function(){
			    	$(this).prop('checked', false);
			    	if($(this).val() == "TBA"){
			    		$(this).prop('checked', true);
			    	}
			    });
			    $("#" + parentId + " .day[value='TBA']").prop('checked', true);

			}else if($(obj).val() == ""){
				$("#" + parentId + " .from").val("");
				$("#" + parentId + " .to").val("");
			}else{
				if(type == "lab"){
					$("#" + parentId + " .to").val(parseInt($("#" + parentId + " .from").val()) + 6 );
				}
			}
			

			$("#" + parentId + " .from").valid();
			$("#" + parentId + " .to").valid();

			checkFac(obj);
			checkRoom(obj);
			checkConflict();
		}

		function checkHour(course_id, type,obj){
			element = $(obj).parent();
			checkFac(element);
			checkRoom(element);
			checkConflict();
		}

		function getForm(){
			formData = $("#createSchedule-form").serializeArray();
			
			$("#curri-card").hide();

			$("#prio-card").hide();

			$("#generate-card").hide();
			var section = checkSection();
			
			if (section == 1) {
				if ($("#curricula_id").val() != "" && $("#year").val() != "" && $("#sem").val() != "" && $("#section").val() != "" && $("#size").val() != "") {
					$('body').loadingModal({text: 'Loading...', 'animation': 'wanderingCubes'});
					$('body').loadingModal("show");
					$("#curriculum-form").load('/schedule/getCurriculaForm', formData, function(){

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
								diff = 0;
								$.validator.addMethod('lab', function(value, element, param) {
									if(value != "TBA"){
								    	return this.optional(element) || Math.abs(parseInt(value) - parseInt($(param).val())) == 6;
									}else{
										return true;
									}
								}, "Invalid Laboratory Time.");

								$(this).rules("add", {
									lt: "#" + parentId + " .to",
									required: true,
								});

								$("#" + parentId + " .labfrom").rules("add", {
									lab: "#" + parentId + " .to",
								});

								$("#" + parentId + " .to").rules("add", {
									gt: "#" + parentId + " .from",
									required: true,
								});

								$("#" + parentId + " .labto").rules("add", {
									lab: "#" + parentId + " .from",
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
								
							})

							$('body').loadingModal("hide");
							$("#input-table").tableHeadFixer({'left' : 1});

						});

						

					});
				}
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
			error = 0;
			$.ajax({
				type:'post',
				url:"/schedule/checkConflict",
				data:createSchedule,
				success:function(result){
						if(result == ""){
							result = "None";
						}

						$("#conflicts").find('.card-block').html(function(){
							html = "";
							var array = JSON.parse(result);
							array.forEach(function(object) {
							  html += object.self + " " + object.selfType + " has conflict with " + object.conflict + " " + object.conflictType + "<br>"
							});
							if (html != "") {
								error = 1;
								$("#conflicts .card").slideDown("fast");
							}else{
								error = 0;
								html = "No errors."
								$("#conflicts .card").slideUp("fast");
							}
							return html;
						});
						
					},
				async:false
			})

			return error;

			// $.post("/schedule/checkConflict", createSchedule, function(result){
			// 	if(result == ""){
			// 		result = "None";
			// 	}

			// 	$("#conflicts").find('.card-block').html(function(){
			// 		html = "";
			// 		var array = JSON.parse(result);
			// 		array.forEach(function(object) {
			// 		  html += object.self + " " + object.selfType + " has conflict with " + object.conflict + " " + object.conflictType + "<br>"
			// 		});
			// 		if (html != "") {
			// 			$("#conflicts .card").slideDown("fast");
			// 		}else{
			// 			html = "No errors."
			// 			$("#conflicts .card").slideUp("fast");
			// 		}
			// 		return html;
			// 	});
				
			// });
			
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
			var orig_id = id+'-'+type+ '-' +num;
			num++;
			var clone_id = id+'-'+type+ '-' +num;
			$("[id^=" + id + '-' + type + '-]:last').clone(true).attr('id', clone_id).insertAfter("[id^=" + id + '-' + type + '-]:last');
			if(num == 1){
				$("#"+clone_id + " > #action .form-group ").append("<button type='button' class='btn btn-danger remove' onclick=" +'"'+ "minus('"+clone_id+"')" +'"'+ ">-</button>");

				$("#"+clone_id + " " + ".plus").remove();
			}

			if(type == 'lec'){
				$("#"+clone_id + " " + ".day").each(function(){
					$(this).attr('name', id+"["+num+"]["+type+"_day][]");
				});

				$("#"+clone_id + " " + ".generate").remove();

				$("#"+clone_id + " " + ".from").attr('name', id+"["+num+"]["+type+"_fr]");

				$("#"+clone_id + " " + ".to").attr('name', id+"["+num+"]["+type+"_to]");

				$("#"+clone_id + " " + ".bldg").attr('name', id+"["+num+"]["+type+"_bldg]");

				$("#"+clone_id + " " + ".room").attr('name', id+"["+num+"]["+type+"_room]");

				$("#"+clone_id + " " + ".faculty").attr('name', id+"["+num+"]["+type+"_fac]");

				$("#"+clone_id + " " + ".type").attr('name', id+"["+num+"]["+type+"_type]");

				$("#"+clone_id + " " + ".department").siblings(".chosen-container").remove();

				$("#"+clone_id + " " + ".department").remove();
			}
			else if(type == 'lab'){
				$("#"+clone_id + " " + ".day").each(function(){
					$(this).attr('name', id+"-lab["+num+"]["+type+"_day][]");
				});

				$("#"+clone_id + " " + ".generate").remove();

				$("#"+clone_id + " " + ".from").attr('name', id+"-lab["+num+"]["+type+"_fr]");

				$("#"+clone_id + " " + ".to").attr('name', id+"-lab["+num+"]["+type+"_to]");

				$("#"+clone_id + " " + ".bldg").attr('name', id+"-lab["+num+"]["+type+"_bldg]");

				$("#"+clone_id + " " + ".room").attr('name', id+"-lab["+num+"]["+type+"_room]");

				$("#"+clone_id + " " + ".faculty").attr('name', id+"-lab["+num+"]["+type+"_fac]");

				$("#"+clone_id + " " + ".type").attr('name', id+"-lab["+num+"]["+type+"_type]");

				$("#"+clone_id + " " + ".department").siblings(".chosen-container").remove();

				$("#"+clone_id + " " + ".department").remove();
			}

			$("#"+orig_id+ " .generate").prop('checked', false);
			$("#"+orig_id+ " .generate").prop('disabled', true);

			$("#"+clone_id + " " + ".remove").attr('onclick', "minus('"+id+"', '"+type+"', "+num+")");
			$("#input-table").tableHeadFixer({'left' : 1});
		}

		function minus(id, type, num){

			$("#"+id+'-'+type+'-'+num).remove();

			name = $("[id^=" + id + '-' + type + '-]:last').attr('id');

			

			index = name.indexOf("-", name.indexOf("-") + 1);
			index++;
			num = "";

			while(Number.isInteger(parseInt(name[index]))){
				num += name[index];
				index++;
			}

			num = parseInt(num);

			if(num == 0){
				$("#"+name+" .generate").prop('checked', true);
				$("#"+name+" .generate").prop('disabled', false);
			}
		}

		function setRooms(course_id,type,obj){
			$(obj).parent().parent().next().children().children(".room").html("<option value=''>Loading</option>");

			$(obj).parent().parent().next().children().children(".room").load('/schedule/getRooms', {'course_id' : course_id, 'type' : type, 'bldgs' : $(obj).val(), '_token' : $("[name='_token']").val() });
		}
	</script>
@endsection