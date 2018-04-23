@extends('admin.layouts.main')

@section('title')
    Edit post
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
            <li class="breadcrumb-item active"><i class="fa fa-pencil-square-o"></i> Edit post</li>
        </ol>
        <div class="panel-default">
            <div class="panel-heading">Edit post</div>
            <div class="panel-body">
                <form action="{{ asset('admin/blog/edit/'.$post->id) }}" method="post">
                    <!-- Token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="col-md-8">
                        <div class="form-group col-md-12">
                            <label for="title">Title</label>
                            <br>
                            <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $post->title }}">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="slug">Slug</label>
                            <br>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') ? old('slug') : $post->slug }}">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="excerpt">Excerpt</label>
                            <br>
                            <textarea class="form-control" rows="6" name="excerpt">{{ old('excerpt') ? old('excerpt') : $post->excerpt }}</textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="body">Body</label>
                            <br>
                            <textarea class="form-control" rows="12" name="body">{{ old('body') ? old('body') : $post->body }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group col-md-12">
                            <label for="category">Category</label>
                            <br>
                            <select class="form-control" name="category_id">
                                <option value selected> --- Choose category --- </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ ($category->id == $post->category_id) ? 'selected' : '' }} >{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary" style="width: 49%">Save</button>
                            <button type="button" class="btn btn-danger" style="width: 49%">Canel</button>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="published_at">Publish Date</label>
                            <br>
                            <div class="input-group date" data-provide="datepicker" id="datetimepicker">
                                <input type="text" class="form-control" name="published_at"  value="{{ old('published_at') ? old('published_at') : (($post->published_at) ? $post->published_at : '') }}">
                                <div class="input-group-btn">
                                    <span class="btn btn-danger">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="image">Feature Image</label>
                            <br>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                    <?php $img = ($post->image) ? 'images/'.$post->image : ''; ?>
                                    <img src="{{ asset(''.$img) }}">
                                </div>
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