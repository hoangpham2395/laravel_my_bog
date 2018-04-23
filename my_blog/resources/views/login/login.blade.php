<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}">
</head>
<body>
	<center>
		<div class="login-logo"></div>

		<div class="login-box">
			<form action="{{ url('login') }}" method="post" role="form">
				<p class="title">Login</p>

				<p>
					@if ($errors->any()) 
						<div class="alert alert-danger" style="margin: 0 50px;">
							<ul>
								@foreach ($errors->all() as $error)
									<li class="text-left" style="margin-left: 10px; list-style: none;">&#8226; {{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

				</p>

				<p class="login-input">
					<input type="text" placeholder="Email" name="email" value="{{ old('email') }}">
				</p>
				<p class="login-input">
					<input type="password" placeholder="Password" name="password">
				</p>
				<p class="text-left" style="margin-left: 50px;">
					<input type="checkbox" name="remember"> Remember me
				</p>
				
				<!-- Token -->
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<p class="login-button">
					<button type="submit" class="submit" name="submit">Login</button>
				</p>
				<!-- <p class="span">or</p>
				<p class="login-button">
					<button type="button" class="facebook" name="facebook">Facebook</button>
				</p>
				<p class="span">or</p>
				<p class="login-button">
					<button type="button" class="google" name="google+">Google +</button>
				</p> -->

				<p><a href="">Forget password?</a> | <a href="{{ asset('register') }}">Create account</a></p>
			</form>			

			<div class="close">
				<a href="{{ asset('blog') }}"><i class="fa fa-times"></i></a>
			</div>
		</div>

		<div class="login-footer">
			<p><i>&copy; 2017 Pham Huy Hoang</i></p>
		</div>
	</center>

	<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>