<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Blog</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
			      	</button>
			      	<a class="navbar-brand" href="{{ route('blog.index') }}">MY BLOG</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="{{ route('blog.index') }}">Blog</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
						@if (session('message'))
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">{{ session('message') }} <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="{{ asset('logout') }}">Logout</a></li>
								</ul>
							</li>
						@else 
							<li><a href="{{ asset('login') }}">Login</a></li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
		<div class="navbar navbar-default"></div>
	</header>

	<!-- Main content -->	
				
	@yield('content')

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<p class="copyright">&copy; 2017 Phạm Huy Hoàng</p>
				</div>
				<div class="col-md-4">
					<nav>
						<ul class="social-icons">
							<li><a href="#" class="i fa fa-github"></a></li>
							<li><a href="#" class="i fa fa-google-plus"></a></li>
							<li><a href="#" class="i fa fa-twitter"></a></li>
							<li><a href="#" class="i fa fa-facebook"></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>	
	</footer>

	<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

	<!-- GOOGLE TRENDS  -->
	<!-- <script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/1140_RC03/embed_loader.js"></script> 
	<script type="text/javascript"> 
		trends.embed.renderExploreWidget("TIMESERIES", {"comparisonItem":[{"keyword":"bất động sản","geo":"VN","time":"today 12-m"}],"category":0,"property":""}, {"exploreQuery":"q=b%E1%BA%A5t%20%C4%91%E1%BB%99ng%20s%E1%BA%A3n&date=today 12-m","guestPath":"https://trends.google.com:443/trends/embed/"}); 
	</script> -->  
	<!-- GOOGLE TRENDS 
	<script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/1140_RC03/embed_loader.js"></script> <script type="text/javascript"> trends.embed.renderExploreWidget("GEO_MAP", {"comparisonItem":[{"keyword":"/m/060kv","geo":"VN","time":"today 12-m"}],"category":0,"property":""}, {"exploreQuery":"geo=VN&q=%2Fm%2F060kv&date=today 12-m","guestPath":"https://trends.google.com:443/trends/embed/"}); </script>  -->
</body>
</html>