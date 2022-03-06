<!DOCTYPE html>
<html style=";">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title>Dashboard - Brand</title>
		<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
		<link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
		<!-- <link rel="stylesheet" href="assets/fonts/font-awesome.min.css"> -->
		<link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.min.css') }}">
		<!-- <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css"> -->
		<link rel="stylesheet" href="{{ asset('assets/css/Multi-step-form.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/untitled.css') }}">
	</head>
	<body id="page-top">
		<div id="wrapper">
            @include('v1.user.layouts.sidebar')
		@yield('main')
		<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/Multi-step-form.js') }}"></script>
		<script src="{{ asset('assets/js/theme.js') }}"></script>
	</body>
</html>
