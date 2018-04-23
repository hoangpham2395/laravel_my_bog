@extends('admin.layouts.main')

@section('title')
	Add new post
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
			<li class="breadcrumb-item active"><i class="fa fa-plus"></i> Add new post</li>
		</ol>
		<div class="panel-default">
			<div class="panel-heading">Add new post</div>
			<div class="panel-body">
				<form action="{{ asset('admin/blog/create') }}" method="post">

					<!-- Token -->
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<!-- Author -->
					<input type="hidden" name="author_id" value="{{ Auth::user()->id }}">

					<div class="col-md-8">
						<div class="form-group col-md-12">
							<label for="title">Title</label>
							<br>
							<input type="text" class="form-control" name="title" value="{{ old('title') }}">
						</div>

						<div class="form-group col-md-12">
							<label for="slug">Slug</label>
							<br>
							<input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
						</div>

						<div class="form-group col-md-12">
							<label for="excerpt">Excerpt</label>
							<br>
							<textarea class="form-control" rows="6" name="excerpt">{{ old('excerpt') }}</textarea>
						</div>

						<div class="form-group col-md-12">
							<label for="body">Body</label>
							<br>
							<textarea class="form-control" rows="12" name="body">{{ old('body') }}</textarea>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group col-md-12">
							<label for="published_at">Publish Date</label>
							<br>
							<div class="input-group date" data-provide="datepicker" id="datepicker">
								<input type="text" class="form-control" name="published_at" value="{{ old('published_at') }}">
								<div class="input-group-btn">
									<span class="btn btn-danger">
										<i class="fa fa-calendar"></i>
									</span>
								</div>
								<!-- <script type="text/javascript">
						            $(function () {
						                $('#datepicker').datetimepicker({
						                    locale: 'ru'
						                });
						            });
						        </script> -->
							</div>
					    </div>

					    <div class="form-group col-md-12">
							<label for="category">Category</label>
							<br>
							<select class="form-control" name="category_id">
								<option value selected> --- Choose category --- </option>
								@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->title }}</option>
								@endforeach
							</select>
						</div>

						<!-- Date: create and update -->
						<!-- <input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s');?>">
						<input type="hidden" name="updated_at" value="<?php echo date('Y-m-d H:i:s');?>"> -->

						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-primary" style="width: 49%">Save</button>
							<button type="reset" class="btn btn-danger" style="width: 49%">Reset</button>
						</div>

						<div class="form-group col-md-12">
							<label for="image">Feature Image</label>
							<br>
							<div class="fileinput fileinput-new" data-provides="fileinput">
  								<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
  								<div>
    								<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="image"></span>
    								<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection