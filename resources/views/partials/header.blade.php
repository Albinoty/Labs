<!-- Header section -->
<header class="header-section" id="top">
	<div class="logo">
		<img src="{{isset($home) ? asset('/storage/'.$home->logo) : asset('/img/logo.png') }}" alt=""><!-- Logo -->
	</div>
	<!-- Navigation -->
	<div class="responsive"><i class="fa fa-bars"></i></div>
	<nav>
		<ul class="menu-list">
			<li class="{{ $actif=="home" ? "active" : "" }}"><a href="/">Home</a></li>
			<li class="{{ $actif=="services" ? "active" : "" }}"><a href="/service">Services</a></li>
			<li class="{{ $actif=="blog" ? "active" : "" }}"><a href="/blog">Blog</a></li>
			<li class="{{ $actif=="contact" ? "active" : "" }}"><a href="/contact">Contact</a></li>
			@auth
				<li class=""><a href="{{route('home')}}">Dashboard</a></li>
			@endauth
		</ul>
	</nav>
</header>
<!-- Header section end -->
