<!DOCTYPE html>
<html>
<head>
	<title> Admin - @yield('title') </title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jasny-bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}">
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bootstrap-datetimepicker2.min.css') }}"> -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin.css') }}">
	@yield('dashboard-css')
</head>
<body>
	<header>
		<nav class="navbar navbar-fixed-top background-blue" role="navigation">
			<div class="navbar-header">
				<button type="button" id="button-collapse" data-toggle="collapse"  data-target="#menu-collapse">
					<i class="fa fa-bars"></i>
				</button>
				<a class="navbar-brand" href="#">MY BLOG</a>
			</div>
	
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('images/avatar.png') }}"> {{ Auth::user()->name }} <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="fa fa-user"></i> My profile</a></li>
						<li><a href="#"><i class="fa fa-lock"></i> Change password</a></li>
						<li><a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav>

		<!-- Sửa lỗi fixed -->
		<div class="navbar"></div>
	</header>

	<!-- Main content -->
	<div class="main-content">
		@include('admin.layouts.sidebar')

		@yield('content')
	</div>

	<footer>
		<p class="copyright">Copyright &copy;<strong> 2017 Nhóm DSD09</strong></p>
	</footer>
	
	@yield('dashboard-footer')

	<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jasny-bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
	<!-- <script type="text/javascript" src="{{ asset('asset/js/bootstrap-datetimepicker2.min.js') }}"></script> -->
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->
	<script type="text/javascript" src="{{ asset('assets/js/admin.js') }}"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$('#button-collapse').click(function () {
				$('#menu-collapse').toggle();
			});

			$('#datetimepicker').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '-3d'
            });
		});
	</script>
</body>
</html>