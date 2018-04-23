<article class="post-item">
	<div class="comment padding-10">
		<h2 class="text-center">Leave a comment</h2>
		<form action="{{ url('blog') }}" method="POST" role="form">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="post_id" value="{{ $post->id }}">
			<input type="hidden" name="slug" value="{{ $post->slug }}">
			<div class="form-group">
				<label>Name <span class="required">*</span></label>
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-user"></i>
					</span>
					<input type="text" class="form-control" name="name" value="{{ old('name') }}">
				</div>
				@if ($errors->has('name'))
					<span style="color: red;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ $errors->first('name') }}</span>
				@endif
			</div>

			<div class="form-group">
				<label>Email <span class="required">*</span></label>
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-envelope-o"></i>
					</span>
					<input type="text" class="form-control" name="email" value="{{ old('email') }}">
				</div>
				@if ($errors->has('email'))
					<span style="color: red;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ $errors->first('email') }}</span>
				@endif
			</div>

			<div class="form-group">
				<label>Comment <span class="required">*</span></label>
				<textarea class="form-control" rows="6" name="comment">{{ old('comment') }}</textarea>
				@if ($errors->has('comment'))
					<span style="color: red;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ $errors->first('comment') }}</span>
				@endif
			</div>

			<div class="clearfix">
				<div class="pull-left">
					<button type="submit" class="btn btn-success">Submit<button>
				</div>
				<div class="pull-right">
					<p class="text-muted">
						<span class="required">*</span>
						<em>Indicates required fields</em>
					</p>
				</div>
			</div>
		</form>
	</div>
</article>