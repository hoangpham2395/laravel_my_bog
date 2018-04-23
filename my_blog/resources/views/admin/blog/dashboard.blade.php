@extends('admin.layouts.main')

@section('title')
	Dashboard
@endsection

@section('content')
	<div class="main-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#"><i class="fa fa-home"></i> Home</a>
			</li>
			<li class="breadcrumb-item active"><i class="fa fa-dashboard"></i> Dashboard</li>
		</ol>
		<div class="panel-default">
			<div class="panel-heading">Dashboard</div>
			<div class="panel-body">
				<span style="font-size: 18px;">Hello <b>{{ Auth::user()->name }}</b>, wellcome to <b>MYBLOG</b>.</span>
				<br><br>
				<span>Your post: <b>{{ $post->count() }}</b>. <b>Get started</b></span>
				<br><br>
				<a href="{{ asset('admin/blog/create') }}" class="btn btn-primary">Write your post</a>
				<br><br>
				<span><b>Statistic:</b></span>
				<br><br>
				<div class="dashboard-static">
					<div class="icon dashboard-blog"><i class="fa fa-pencil"></i></div>
					<div class="number number-blog">{{ $posts }}</div>
				</div>
				<div class="dashboard-static">
					<div class="icon dashboard-category"><i class="fa fa-folder"></i></div>
					<div class="number number-category">{{ $categories }}</div>
				</div>
			</div>
		</div>
	</div>
@endsection