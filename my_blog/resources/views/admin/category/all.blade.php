@extends('admin.layouts.main')

@section('title')
	All categories
@endsection

@section('content')
	<div class="main-body">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#"><i class="fa fa-home"></i> Home</a>
			</li>
			<li class="breadcrumb-item">
				<a href="#"><i class="fa fa-folder"></i> Category</a>
			</li>
			<li class="breadcrumb-item active"><i class="fa fa-list-alt"></i> All categories</li>
		</ol>
		<div class="panel-default">
			<div class="panel-heading">All categories</div>
			<div class="panel-body">
				<form>
					@if (session('message-category'))
						<div class="alert alert-success">
							{{ session('message-category') }}
						</div>
					@endif

					<div style="margin-bottom: 15px;">
						<a href="{{ asset('admin/category/create') }}" class="btn btn-primary">
							<i class="fa fa-plus"></i> Add new
						</a>
					</div>


					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="10%" class="text-center">Action</th>
									<th width="75%">Category Name</th>
									<th width="15%" class="text-center">Post Count</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($categories as $category)
									<tr>
										<td class="text-center">
											<a href="{{ asset('admin/category/edit/'.$category->id) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o"></i></a>
											<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
										</td>
										<td>{{ $category->title }}</td>
										<td class="text-center">{{ $category->posts->count() }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="pagination">
						{{ $categories->links() }}
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection