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
	<title>Agent Invitation</title>
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
        
    </div>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	
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