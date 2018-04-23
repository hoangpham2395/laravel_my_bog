@extends('admin.layouts.main')

@section('title')
	All posts
@endsection

@section('content')
	<div class="main-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#"><i class="fa fa-home"></i> Home</a>
			</li>
			<li class="breadcrumb-item">
				<a href="#"><i class="fa fa-pencil"></i> Blog</a>
			</li>
			<li class="breadcrumb-item active"><i class="fa fa-list-alt"></i> All posts</li>
		</ol>
		<div class="panel-default">
			<div class="panel-heading">All posts</div>
			<div class="panel-body">
				<form>
					@if (session('message-blog'))
						<div class="alert alert-success">
							{{ session('message-blog') }}
						</div>
					@endif
					<div style="margin-bottom: 15px;">
						<a href="{{ asset('admin/blog/create') }}" class="btn btn-primary">
							<i class="fa fa-plus"></i> Add new
						</a>

						<div style="float: right;">
							<a href="">All (10)</a> | 
							<a href="">Publish (8)</a> |
							<a href="">Draft (2)</a>
						</div>
					</div>


					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="10%" class="text-center">Action</th>
									<th>Title</th>
									<th>Author</th>
									<th>Category</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($posts as $post)
									<tr>
										<td class="text-center">
											<a href="{{ asset('admin/blog/edit/'.$post->id) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o"></i></a>
											<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
										</td>
										<td>{{ $post->title }}</td>
										<td>{{ $post->author->name }}</td>
										<td>{{ $post->category->title }}</td>
										<td>{{ ($post->published_at) ? $post->published_at : '' }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="pagination">
						{{ $posts->links() }}
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection