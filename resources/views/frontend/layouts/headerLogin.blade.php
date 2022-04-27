<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="{{asset('css/homepage.css')}}"> -->

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('templates/login/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="{{asset('templates/login/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" type="text/css" href="{{asset('templates/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> -->
	<link rel="stylesheet" type="text/css" href="{{asset('templates/login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<!-- <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> -->
	<link rel="stylesheet" type="text/css" href="{{asset('templates/login/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> -->
	<link rel="stylesheet" type="text/css" href="{{asset('templates/login/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="css/util.css"> -->
	<link rel="stylesheet" type="text/css" href="{{asset('templates/login/css/util.css')}}">
	<!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
	<link rel="stylesheet" type="text/css" href="{{asset('templates/login/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
@yield('content')
	
<!--===============================================================================================-->	
	<!-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script> -->
	<script src="{{asset('templates/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<!-- <script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
	<script src="{{asset('templates/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('templates/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<!-- <script src="vendor/select2/select2.min.js"></script> -->
	<script src="{{asset('templates/login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<!-- <script src="vendor/tilt/tilt.jquery.min.js"></script> -->
	<script src="{{asset('templates/login/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<!-- <script src="js/main.js"></script> -->
	<script src="{{asset('templates/login/js/main.js')}}"></script>

</body>
</html>