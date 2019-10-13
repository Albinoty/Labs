@extends('templates.index')

@section('head')
    @include('templates.head')
@endsection

@section('header')
    @include('templates.header')
@endsection

@section('contenu')

	<!-- Intro Section -->
	<div class="hero-section">
		<div class="hero-content">
			<div class="hero-center">
				<img src="img/big-logo.png" alt="">
				<p>Get your freebie template now!</p>
			</div>
		</div>
		<!-- slider -->
		<div id="hero-slider" class="owl-carousel">

			@foreach ($medias as $media)
				<div class="item  hero-item" data-bg="storage/{{$media->img_path}}">
					<img src="/storage/{{$media->img_path}}" alt="">
				</div>
			@endforeach
		</div>
	</div>
	<!-- Intro Section -->


	<!-- About section -->
	<div class="about-section">
		<div class="overlay"></div>
		<!-- card section -->
		<div class="card-section">
			<div class="container">
				<div class="row">
					<!-- single card -->
					@foreach ($servicesTop as $serviceTop)
						<div class="col-md-4 col-sm-6">
							<div class="lab-card">
								<div class="icon">
									<i class="{{$serviceTop->logo}}"></i>
								</div>
								<h2>{{$serviceTop->titre}}</h2>
								<p>{{$serviceTop->description}}</p>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- card section end-->

		<!-- About contant -->
		<div class="about-contant">
			<div class="container">
				<div class="section-title">
					<h2>Get in <span>the Lab</span> and discover the world</h2>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus. Donec maximus ipsum non ornare vporttitor porttitorestibulum. Sed libero nibh, feugiat at enim id, bibendum sollicitudin arcu.</p>
					</div>
					<div class="col-md-6">
						<p>Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra a eget nisi. Aenean pellentesque elit vitae eros dignissim ultrices. Quisque porttitor porttitorlaoreet vel risus et luctus.</p>
					</div>
				</div>
				<div class="text-center mt60">
					<a href="" class="site-btn">Browse</a>
				</div>
				<!-- popup video -->
				<div class="intro-video">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<img src="img/video.jpg" alt="">
							<a href="https://www.youtube.com/watch?v=X1ydNGz4rPM" class="video-popup">
								<i class="fa fa-play"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About section end -->


	<!-- Testimonial section -->
	<div class="testimonial-section pb100">
		<div class="test-overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-4">
					<div class="section-title left">
						<h2>What our clients say</h2>
					</div>
					<div class="owl-carousel" id="testimonial-slide">
						<!-- single testimonial -->
						<div class="testimonial">
							<span>‘​‌‘​‌</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
							<div class="client-info">
								<div class="avatar">
									<img src="img/avatar/01.jpg" alt="">
								</div>
								<div class="client-name">
									<h2>Michael Smith</h2>
									<p>CEO Company</p>
								</div>
							</div>
						</div>
						<!-- single testimonial -->
						<div class="testimonial">
							<span>‘​‌‘​‌</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
							<div class="client-info">
								<div class="avatar">
									<img src="img/avatar/02.jpg" alt="">
								</div>
								<div class="client-name">
									<h2>Michael Smith</h2>
									<p>CEO Company</p>
								</div>
							</div>
						</div>
						<!-- single testimonial -->
						<div class="testimonial">
							<span>‘​‌‘​‌</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
							<div class="client-info">
								<div class="avatar">
									<img src="img/avatar/01.jpg" alt="">
								</div>
								<div class="client-name">
									<h2>Michael Smith</h2>
									<p>CEO Company</p>
								</div>
							</div>
						</div>
						<!-- single testimonial -->
						<div class="testimonial">
							<span>‘​‌‘​‌</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
							<div class="client-info">
								<div class="avatar">
									<img src="img/avatar/02.jpg" alt="">
								</div>
								<div class="client-name">
									<h2>Michael Smith</h2>
									<p>CEO Company</p>
								</div>
							</div>
						</div>
						<!-- single testimonial -->
						<div class="testimonial">
							<span>‘​‌‘​‌</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
							<div class="client-info">
								<div class="avatar">
									<img src="img/avatar/01.jpg" alt="">
								</div>
								<div class="client-name">
									<h2>Michael Smith</h2>
									<p>CEO Company</p>
								</div>
							</div>
						</div>
						<!-- single testimonial -->
						<div class="testimonial">
							<span>‘​‌‘​‌</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.</p>
							<div class="client-info">
								<div class="avatar">
									<img src="img/avatar/02.jpg" alt="">
								</div>
								<div class="client-name">
									<h2>Michael Smith</h2>
									<p>CEO Company</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Testimonial section end-->


	@include('templates.services')

	<!-- Team Section -->
	<div class="team-section spad">
		<div class="overlay"></div>
		<div class="container">
			<div class="section-title">
				<h2>Get in <span>the Lab</span> and  meet the team</h2>
			</div>
			<div class="row">
				<!-- single member -->
				<div class="col-sm-4">
					<div class="member">
						<img src="img/team/1.jpg" alt="">
						<h2>Christinne Williams</h2>
						<h3>Project Manager</h3>
					</div>
				</div>
				<!-- single member -->
				<div class="col-sm-4">
					<div class="member">
						<img src="img/team/2.jpg" alt="">
						<h2>Christinne Williams</h2>
						<h3>Junior developer</h3>
					</div>
				</div>
				<!-- single member -->
				<div class="col-sm-4">
					<div class="member">
						<img src="img/team/3.jpg" alt="">
						<h2>Christinne Williams</h2>
						<h3>Digital designer</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Team Section end-->


	<!-- Promotion section -->
	<div class="promotion-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h2>Are you ready to stand out?</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est.</p>
				</div>
				<div class="col-md-3">
					<div class="promo-btn-area">
						<a href="" class="site-btn btn-2">Browse</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Promotion section end-->
@endsection

@section('contact')
	<!-- Contact section -->
	<div class="contact-section spad fix">
		<div class="container">
			<div class="row">
				@include('templates.contact')
				@include('templates.form')
			</div>
		</div>
	</div>
	<!-- Contact section end-->
@endsection


@section('footer')
    @include('templates.footer')
@endsection