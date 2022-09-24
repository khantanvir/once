<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>{{ (!empty($page_title))?$page_title:'' }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.css" rel="stylesheet">
    <style>
		body{
			background-color: #09919f !important;
		}
		.custom-main{
			background-color: #e2eaeb;
			margin-top: 50px;
			padding: 20px;
		}
	</style>
	
</head>
<body>
    <div class="custom-main container">
        @yield('agent')
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/js/bootstrap-colorpicker.js"></script>

    <script src="{{ asset('frontend/agent/vendor/select2/select2.min.js ') }}"></script>
    <script src="{{ asset('frontend/agent/vendor/datepicker/moment.min.js ') }}"></script>
    <script src="{{ asset('frontend/agent/vendor/datepicker/daterangepicker.js ') }}"></script>
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
	<script>
		@if(Session::has('success'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true,
			"timeOut": "10000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
		}
				toastr.success("{{ session('success') }}");
		@endif
	  
		@if(Session::has('error'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true,
			"timeOut": "10000",
			"positionClass": "toast-top-right",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
		}
				toastr.error("{{ session('error') }}");
		@endif
	  
		@if(Session::has('info'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true,
			"timeOut": "10000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
		}
				toastr.info("{{ session('info') }}");
		@endif
	  
		@if(Session::has('warning'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true,
			"timeOut": "10000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
		}
				toastr.warning("{{ session('warning') }}");
		@endif
	  </script>
	  <script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		</script>
        <script type="text/javascript">
            $(document).ready(function(){
                $.get("http://127.0.0.1:8000/api/get-all-requested-agents",function(data,status){
					if(data['result']['key']===101){
						alert(data['result']['val']);
					}
					if(data['result']['key']===200){
						console.log(data['result']['val']);
						//$('#productAttributeModal').html(data['result']['val']);
					}
				});
            });
        </script>
		<script>
			function get_branch_by_country(){
				var country_name = $('#country').val();
				$.get("{{ URL::to('get-branch-by-country') }}/"+country_name,function(data,status){
					console.log(data);
					//$("#branch_id").html(data['result']['val']);
					if(data['result']['key']===101){
						alert(data['result']['val']);
					}
					if(data['result']['key']===200){
						$('#branch_id').html(data['result']['val']);
					}
				});
			}
		</script>
		<script type="text/javascript">
			$(function () {
			  $('#color')
			  .colorpicker({})
			  .on('colorpickerChange', function (e) { //change the bacground color of the main when the color changes  
				  new_color = e.color.toString()
				  $('#main').css('background-color', new_color)
			  })     
		  });
	  </script>
</body>
</html>