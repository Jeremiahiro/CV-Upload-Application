<!DOCTYPE html>
<html style=";">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title>@yield('title')</title>
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
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
		{{-- <link rel="stylesheet" href="{{ asset('/css/custom.css') }}"> --}}

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

	</head>
	<body id="page-top">
		<div id="wrapper" class="w-100">
			<div class="">
				@include('v1.partials.sidebar')
			</div>
			<div class="w-100 h-100 position-relative bg-light">
				<main class="pb-5">
					<div >
						@include('v1.partials.message')
					</div>
					@yield('main')
				</main>
				<div class="position-absolute bottom-0">
					{{-- <footer class="bg-light footer sticky-footer">
						<div class="container">
							<div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
						</div>
					</footer> --}}
				</div>
			</div>
		</div>
		</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
		<script src="{{ asset('assets/js/Multi-step-form.js') }}"></script>

		<script src="{{ asset('assets/js/theme.js') }}"></script>

		@stack('javascript')

	</body>
</html>
