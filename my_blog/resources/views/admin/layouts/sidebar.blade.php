<div id="sidebar">
	<div id="menu-collapse" class="collapse navbar-collapse">
			
	    <ul class="nav navbar-nav side-nav">
	    	<div id="infor">
				<div id="infor-image">
					<img src="{{ asset('images/avatar.png') }}">
				</div>
				<div id="infor-info">
					<p id="infor-name">{{ Auth::user()->name }}</p>
					<p id="infor-online"><i class="fa fa-circle"></i> Online</p>
				</div>
			</div>

	    	<li>
	    		<a href="{{ asset('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
	    	</li>

	        <li>
	            <a href="#" data-toggle="collapse" data-target="#blog"><i class="fa fa-pencil"></i> Blog <i class="fa fa-fw fa-angle-down pull-right"></i></a>
	            <ul id="blog" class="collapse">
	            	<li><a href="{{ asset('admin/blog') }}"><i class="fa fa-list-alt"></i> All posts</a></li>
	                <li><a href="{{ asset('admin/blog/create') }}"><i class="fa fa-plus"></i> Add new post</a></li>
	            </ul>
	        </li>

	        <li>
	            <a href="#" data-toggle="collapse" data-target="#category"><i class="fa fa-folder"></i> Categories <i class="fa fa-fw fa-angle-down pull-right"></i></a>
	            <ul id="category" class="collapse">
	            	<li><a href="{{ asset('admin/category') }}"><i class="fa fa-list-alt"></i> All categories</a></li>
	                <li><a href="{{ asset('admin/category/create') }}"><i class="fa fa-plus"></i> Add new category</a></li>
	            </ul>
	        </li>

	        <li>
	        	<a href="#" data-toggle="collapse" data-target="#users"><i class="fa fa-users"></i> Users <i class="fa fa-fw fa-angle-down pull-right"></i></a>
				<ul id="users" class="collapse">
					<li><a href=""><i class="fa fa-user"></i> My profile</a></li>
					<li><a href=""><i class="fa fa-list-alt"></i> All users</a></li>
					<li><a href=""><i class="fa fa-plus"></i> Add new user</a></li>
				</ul>
	        </li>

	        <li>
	        	<a href="{{ asset('blog') }}" target="blank" ><i class="fa fa-globe"></i> Website</a>
	        </li>
	    </ul>
	</div>
</div>