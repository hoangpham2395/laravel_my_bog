@extends('admin.layouts.main')

@section('title')
	Add new category
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
			<li class="breadcrumb-item active"><i class="fa fa-plus"></i> Add new category</li>
		</ol>

		<div class="panel-default">
			<div class="panel-heading">
				<span>Add new category</span>
			</div>

			<div class="panel-body">
				<form action="{{ asset('admin/category/create') }}" method="post">

					@if ($errors->any()) 
						<div class="form-group col-md-8">
							<div class="alert alert-danger">
								@foreach ($errors as $error)
									&#8226; {{ $error }}	
								@endforeach
							</div>
						</div>
					@endif

					<!-- Token -->
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group col-md-8">
						<label for="title">Title:</label>
						<input type="text" class="form-control" name="title" value="{{ old('title') }}">
					</div>
					<div class="form-group col-md-8">
						<label for="slug">Slug:</label>
						<input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary" name="sb">Save</button>
						<button type="reset" class="btn btn-danger" name="rs">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection