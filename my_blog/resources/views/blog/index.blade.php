@extends('layouts.main')

@section('content')
	<div class="container">
		<div class="row">
			<!-- Content -->
			<div class="col-md-8">
				@foreach ($posts as $post)
					<article class="post-item">
						<!-- imageUrl được định nghĩa ở hàm getImageUrlAttribute() trong model -->
						@if ($post->imageUrl)
							<div class="post-item-image">
								<a href="{{ route('blog.show', $post->slug) }}">
									<img src="{{ $post->imageUrl }}" alt="{{ $post->title }}">
								</a>
							</div>
						@endif
						<div class="post-item-body">
							<div class="padding-10">
								<h2><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2>
								<p>{{ $post->excerpt }}</p>
							</div>

							<div class="post-meta padding-10 border-top clearfix">
								<div class="pull-left">
									<ul class="post-meta-group">
										<li><i class="fa fa-user"></i><a href="#"> {{ $post->author->name }}</a></li>
										<!-- date được định nghĩa ở hàm getDateAttribute() trong model -->
										<li><i class="fa fa-clock-o"></i><time> {{ $post->date }}</time></li>
										<li><i class="fa fa-tag"></i><a href="#"> {{ $post->category->title }}</a></li>
										<li><i class="fa fa-comment"></i><a href="#"> {{ App\Comment::where('post_id', $post->id)->count() }} Comments</a></li>
									</ul>
								</div>
								<div class="pull-right">
									<a href="{{ route('blog.show', $post->slug) }}">Continue Reading &raquo;</a>
								</div>
							</div>
						</div>
					</article>
				@endforeach
				
				<!-- Pagination -->
				<nav class="text-center">
					{{ $posts->links() }}
				</nav>
			</div>

			<!-- Sidebar -->
			@include('layouts.sidebar')
			
		</div>
	</div>
@endsection