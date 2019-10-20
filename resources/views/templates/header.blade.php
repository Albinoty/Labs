<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader">
			<img src="{{isset($home) ? '/storage/'.$home->logo : '/img/logo.png'}}" alt="">
			<h2>Loading.....</h2>
		</div>
	</div>


	<!-- Header section -->
	<header class="header-section" id="top">
		<div class="logo">
			<img src="{{isset($home) ? '/storage/'.$home->logo : '/img/logo.png'}}" alt=""><!-- Logo -->
		</div>
		<!-- Navigation -->
		<div class="responsive"><i class="fa fa-bars"></i></div>
		<nav>
			<ul class="menu-list">
				@switch($actif)
					@case("home")
						<li class="active"><a href="/">Home</a></li>
						<li><a href="/service">Services</a></li>
						<li><a href="/blog">Blog</a></li>
						<li><a href="/contact">Contact</a></li>
						@break
					@case("services")
						<li><a href="/">Home</a></li>
						<li class="active"><a href="/service">Services</a></li>
						<li><a href="/blog">Blog</a></li>
						<li><a href="/contact">Contact</a></li>
						@break
					@case("blog")
						<li><a href="/">Home</a></li>
						<li><a href="/service">Services</a></li>
						<li class="active"><a href="/blog">Blog</a></li>
						<li><a href="/contact">Contact</a></li>
						@break
					@case("contact")
						<li><a href="/">Home</a></li>
						<li><a href="/service">Services</a></li>
						<li><a href="/blog">Blog</a></li>
						<li class="active"><a href="/contact">Contact</a></li>
						@break
					@default
						<li><a href="/">Home</a></li>
						<li><a href="/service">Services</a></li>
						<li><a href="/blog">Blog</a></li>
						<li><a href="/contact">Contact</a></li>
						@break
				@endswitch
			</ul>
		</nav>
	</header>
	<!-- Header section end -->
