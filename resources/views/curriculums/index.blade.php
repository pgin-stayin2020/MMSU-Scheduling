@extends('layouts.main')

@section('title')
Curriculum Page - Scheduling System
@endsection

@section('plugin_css')
	<link rel="stylesheet" type="text/css" href="/plugins/css/jquery.loadingModal.css" >
@endsection

@section('plugin_js')
	<script type="text/javascript" src="/plugins/js/jquery.loadingModal.min.js"></script>
@endsection

@section('style')

@endsection

@section('content')

			<h1 class="header">Curriculum</h1>
			<h4 class="schedule-header">List of Schedules</h4>
			
			<div class="card">
				<div class="card-header">
					<h5>Search</h5>
				</div>
				<div class="card-block">
					<form action="#" id="search-form" class="form form-horizontal">
						<div class="container">
							<div class="row">
									{{ csrf_field() }}
									<label for="name" class="form-label col-sm-2">Curriculum:</label>
									<div class="col-sm-4">
										<div class="form-group">
											<select class="form-control" name="curricula" id="curricula">
												@foreach ($curriculas as $curricula)
													<option value="{{ $curricula->id }}">{{ $curricula->description }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<label for="name" class="form-label col-sm-2">Year:</label>
									<div class="col-sm-4">
										<div class="form-group">
											<select class="form-control" name="year" id="year">
													
											</select>
										</div>
									</div>
								
									<label for="name" class="form-label col-sm-2">Sem:</label>
									<div class="col-sm-4">
										<div class="form-group">
											<select class="form-control" name="sem" id="sem">
												
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<input type="submit" class="btn btn-primary" id="search-submit">
										
									</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="result" id="result">
				
			</div>
@endsection

@section('script')
	<script>
		$(document).ready(function(){
		//$('body').loadingModal({text: 'Loading...', 'animation': 'wanderingCubes'});
		
		getYear();
		
		$("#search-submit").click(function(event){
				event.preventDefault();
				formData = $("#search-form").serializeArray();
				$("#result").load('/curriculum/result', formData);
			});

		$("#year").on('change',function(){
			getSem()
		});

	});

	function getYear(){
		formData = $("#search-form").serializeArray();
		$("#year").load("/curriculum/year", formData, function(){
			getSem();
		});
		
	}

	function getSem(){
		$('#sem').append('<option value="">All</option>');
		for (var i = 1; i <= 3; i++) {
				$('#sem').append('<option>' + i + '</option>');
			}
	}
	</script>
@endsection