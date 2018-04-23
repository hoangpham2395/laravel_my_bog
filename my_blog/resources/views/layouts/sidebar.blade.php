<div class="col-md-4">
	<aside>
		<!-- Form search -->
		<div class="search-widget">
			<div class="input-group">
				<input type="text" class="form-control input-lg" placeholder="Search for..." name="search">
				<span class="input-group-btn">
					<button type="button" class="btn btn-lg btn-default">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</div>

		<!-- Category -->
		<div class="widget">
			<div class="widget-heading">
				<h4>Categories</h4>
			</div>
			<div class="widget-body">
				<ul class="categories">
					@foreach ($categories as $category)
						<li><a href="{{ route('category', $category->id) }}"><i class="fa fa-angle-right"></i> {{ $category->title }}</a> <span class="badge">{{ $category->posts->count() }}</span></li>
					@endforeach
				</ul>
			</div>
		</div>

		<!-- Bài đăng phổ biến -->
		<div class="widget">
			<div class="widget-heading">
				<h4>Popular Posts</h4>
			</div>
			<div class="widget-body">
				<ul class="popular-posts">
					@foreach ($posts as $post)
						<li>
							<div class="post-image">
								<a href="{{route('blog.show', $post->slug)}}">
									<img src="{{ $post->imageUrl }}" alt="">
								</a>
							</div>
							<div class="post-body">
								<h6><a href="{{route('blog.show', $post->slug)}}">{{ $post->title }}</a></h6>
								<div class="post-meta">
									<span>{{ $post->date }}</span>
								</div>
							</div>
							<div class="clearfix"></div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>

		<!-- Tags -->
		<div class="widget">
			<div class="widget-heading">
				<h4>Tags</h4>
			</div>
			<div class="widget-body">
				<ul class="tags">
					<li><a href="">PHP</a></li>
					<li><a href="">Codeigniter</a></li>
					<li><a href="">Laravel</a></li>
					<li><a href="">Ruby</a></li>
					<li><a href="">Angularjs</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
	</aside>
</div>