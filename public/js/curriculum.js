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
		formData = $("#search-form").serializeArray();
		$("#sem").load("/curriculum/sem", formData);
	}