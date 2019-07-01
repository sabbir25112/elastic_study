@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
	.ui-autocomplete-loading {
		background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
	}
</style>


<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Location Search</div>

				<div class="card-body">					
					<input id="search" type="text" class="form-control" name="search" autofocus placeholder="Search Here" >

					<br>
					Lat: <input id="lat" type="number" class="form-control" name="lat">

					<br>
					Lon: <input id="lon" type="number" class="form-control" name="lon">
				</div>
			</div>
		</div>
	</div>
</div>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
	var src = "{{ route('location-autocomplete')}}";

	$(function() {
		$('#search').autocomplete({
			source: function (request, response) {
				$.ajax({
					url 	 : src,
					dataType : "json",
					data: {
	                	search  : $('#search').val(),
	                	lat 	: $('#lat').val(),
	                	lon 	: $('#lon').val()
	            	},
	            	success: function(data) {
	                	console.log(data);
	                	response(data);
	            	}
				});
			},
			min_length: 2,
			select: function( event, ui ) {
	        	console.log(ui);
	      	}
		});
	});
</script>
@endsection