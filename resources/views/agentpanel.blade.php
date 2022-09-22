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
    <link href="{{ asset('frontend/agent/vendor/mdi-font/css/material-design-iconic-font.min.css ') }}" rel="stylesheet" media="all">
    <link href="{{ asset('frontend/agent/vendor/font-awesome-4.7/css/font-awesome.min.css ') }}" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('frontend/agent/vendor/select2/select2.min.css ') }}" rel="stylesheet" media="all">
    <link href="{{ asset('frontend/agent/vendor/datepicker/daterangepicker.css ') }}" rel="stylesheet" media="all">
    <link href="{{ asset('frontend/agent/css/main.css ') }}" rel="stylesheet" media="all">
</head>
<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        @yield('agent')
    </div>
    <script src="{{ asset('frontend/agent/vendor/jquery/jquery.min.js ') }}"></script>
    <script src="{{ asset('frontend/agent/vendor/select2/select2.min.js ') }}"></script>
    <script src="{{ asset('frontend/agent/vendor/datepicker/moment.min.js ') }}"></script>
    <script src="{{ asset('frontend/agent/vendor/datepicker/daterangepicker.js ') }}"></script>
    <script src="{{ asset('frontend/agent/js/global.js ') }}"></script>
    <!--<script src="{{ asset('backend/js/styleSwitcher.js ') }}"></script>-->
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
</body>
</html>