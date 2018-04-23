@extends('layouts.main')

@section('content')
	<div class="container">
		<div class="row">
			<!-- Main content -->
			<div class="col-md-8">
				<!-- Content -->
				<article class="post-item">
					@if ($post->imageUrl)
						<div class="post-item-image">
							<img src="../images/{{ $post->image }}" alt="{{ $post->title }}">
						</div>
					@endif
					<div class="post-item-body">
						<div class="padding-10">
							<h1>{{ $post->title }}</h1>
							<div class="post-meta clearfix" style="margin-bottom: 20px;">
								<div class="pull-left">
									<ul class="post-meta-group">
										<li><i class="fa fa-user"></i><a href="#"> {{ $post->author->name }}</a></li>
										<li><i class="fa fa-clock-o"></i><time> {{ $post->date }}</time></li>
										<li><i class="fa fa-tag"></i><a href="#"> {{ $post->category->title }}</a></li>
										<li><i class="fa fa-comment"></i><a href="#"> {{ $comments->count() }} Comments</a></li>
									</ul>
								</div>
							</div>
							<p><b>{{ $post->excerpt }}</b></p>
							<p>{{ $post->body }}</p>
						</div>
					</div>
				</article>

				<!-- Author -->
				<article class="post-item">
					<div class="media padding-10">
						<div class="media-left">
							<img class="media-object" src="../images/demo1.png" alt="Author">
						</div>
						<div class="media-body">
							<h4>{{ $post->author->name }}</h4>
							<p><i class="fa fa-clone"></i> {{ $author->count() }} @if ($author->count() > 1) posts @else post @endif</p>
							<p>{{ $post->title }}</p>
						</div>
					</div>
				</article>

				<!-- List comment -->
				<article class="post-item">
					<div class="padding-10">
						<div class="list-comments">
							<h2><i class="fa fa-comments"></i> {{ $comments->count() }} Comments</h2>
							
							@foreach ($comments as $comment)

								<div class="list-comments-item padding-10">
									<div class="list-comments-item-heading">
										<h4>{{ $comment->name }} <time>{{ $comment->created_at->diffForHumans() }}</time></h4>
									</div>
									<div class="list-comments-item-body">
										<p>{{ $comment->comment }}</p>
									</div>
								</div>
							
							@endforeach

							<!-- <div class="list-comments-item padding-10">
								<div class="list-comments-item-heading">
									<h4>John Doe <time>Juanary 14, 2017</time></h4>
								</div>
								<div class="list-comments-item-body">
									<p>Cụ thể, theo tờ Mirror đưa tin, Kylian Mbappe đã vượt qua buổi kiểm tra y tế bắt buộc ngay tại đại bản doanh sân tập của tuyển Pháp Clairefontaine. Mọi thứ đã diễn ra cực kỳ suôn sẻ và PSG sẽ sớm công bố bản hợp đồng Mbappe.</p>
									<p>Được biết, PSG sẽ hỏi mượn Mbappe kèm điều khoản mua đứt vào năm tới với giá 180 triệu euro. Đây là cách để 'Gã nhà giàu nước Pháp' lách luật công bằng tài chính. Ở chiều hướng ngược lại, AS Monaco cũng đã tìm được người thay thế Mbappe là Stefan Jovetic đến từ Inter Milan.</p>
								</div>
								<div class="list-replies">
									<div class="list-replies-item padding-10">
										<div class="list-replies-item-heading">
											<h4>John Doe <time>Juanary 14, 2017</time></h4>
										</div>
										<div class="list-replies-item-body">
											<p>Cụ thể, theo tờ Mirror đưa tin, Kylian Mbappe đã vượt qua buổi kiểm tra y tế bắt buộc ngay tại đại bản doanh sân tập của tuyển Pháp Clairefontaine. Mọi thứ đã diễn ra cực kỳ suôn sẻ và PSG sẽ sớm công bố bản hợp đồng Mbappe.</p>
											<p>Được biết, PSG sẽ hỏi mượn Mbappe kèm điều khoản mua đứt vào năm tới với giá 180 triệu euro. Đây là cách để 'Gã nhà giàu nước Pháp' lách luật công bằng tài chính. Ở chiều hướng ngược lại, AS Monaco cũng đã tìm được người thay thế Mbappe là Stefan Jovetic đến từ Inter Milan.</p>
										</div>
									</div>

									<div class="list-replies-item padding-10">
										<div class="list-replies-item-heading">
											<h4>John Doe <time>Juanary 14, 2017</time></h4>
										</div>
										<div class="list-replies-item-body">
											<p>Cụ thể, theo tờ Mirror đưa tin, Kylian Mbappe đã vượt qua buổi kiểm tra y tế bắt buộc ngay tại đại bản doanh sân tập của tuyển Pháp Clairefontaine. Mọi thứ đã diễn ra cực kỳ suôn sẻ và PSG sẽ sớm công bố bản hợp đồng Mbappe.</p>
											<p>Được biết, PSG sẽ hỏi mượn Mbappe kèm điều khoản mua đứt vào năm tới với giá 180 triệu euro. Đây là cách để 'Gã nhà giàu nước Pháp' lách luật công bằng tài chính. Ở chiều hướng ngược lại, AS Monaco cũng đã tìm được người thay thế Mbappe là Stefan Jovetic đến từ Inter Milan.</p>
										</div>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</article>

				<!-- Comment -->
				@include('blog.comments')

			</div>

			<!-- Sidebar -->
			@include('layouts.sidebar')
			
		</div>
	</div>
@endsection