<div class="nav-side-menu">
	<div class="brand">Brand Logo</div>
	<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
	<div class="menu-list">
		<ul id="menu-content" class="menu-content collapse in">
			<li>
				<a href="#">
					<i class="fa fa-dashboard fa-lg"></i> Dashboard
				</a>
			</li>
			<li  data-toggle="collapse" data-target="#products" class="collapsed active">
				<a href="#"><i class="fa fa-gift fa-lg"></i>Products<span class="arrow"></span></a>
			</li>
			<ul class="sub-menu collapse" id="products">
				<li class=""><a href="{{ url('admin/products') }}">Index</a></li>
			</ul>

			<li data-toggle="collapse" data-target="#service" class="collapsed">
				<a href="#"><i class="fa fa-globe fa-lg"></i> Classification <span class="arrow"></span></a>
			</li>  
			<ul class="sub-menu collapse" id="service">
				<li><a href="{{ url('admin/classification') }}">Index</a></li>
			</ul>


			<li data-toggle="collapse" data-target="#new" class="collapsed">
				<a href="#"><i class="fa fa-car fa-lg"></i> New <span class="arrow"></span></a>
			</li>
			<ul class="sub-menu collapse" id="new">
				<li>New New 1</li>
				<li>New New 2</li>
				<li>New New 3</li>
			</ul>

			<li>
				<a href="#">
					<i class="fa fa-user fa-lg"></i> Profile
				</a>
			</li>

			<li>
				<a href="#">
					<i class="fa fa-users fa-lg"></i> Users
				</a>
			</li>
		</ul>
	</div>
</div>
