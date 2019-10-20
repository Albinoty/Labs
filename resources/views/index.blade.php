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
				<img src="{{isset($home) ? '/storage/'.$home->logo_carousel : 'img/big-logo.png'}}" alt="">
				<p>{{ isset($home) ? $home->texte_carousel : 'Get your freebie template now!'}}</p>
			</div>
		</div>
		<!-- slider -->
		<div id="hero-slider" class="owl-carousel">

			@foreach ($medias as $media)
				<div class="item  hero-item" data-bg="storage/{{$media->img_path}}"></div>
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
						<p>{{ isset($home) ? $home->texte_gauche : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus. Donec maximus ipsum non ornare vporttitor porttitorestibulum. Sed libero nibh, feugiat at enim id, bibendum sollicitudin arcu.'}}</p>
					</div>
					<div class="col-md-6">
						<p>{{ isset($home) ? $home->texte_droite : 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra a eget nisi. Aenean pellentesque elit vitae eros dignissim ultrices. Quisque porttitor porttitorlaoreet vel risus et luctus.'}}</p>
					</div>
				</div>
				<div class="text-center mt60">
					<a href="#top" class="site-btn">{{isset($bouton) != null ? $bouton->texte : 'browse'}}</a>
				</div>
				<!-- popup video -->
				<div class="intro-video">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<img src="img/video.jpg" alt="">
								<a href="{{isset($home) ? $home->url_video : 'https://www.youtube.com/watch?v=gFO3EKlZDao'}}" class="video-popup" allow="autoplay">
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

						@foreach ($testimonials as $testimonial)
							<div class="testimonial">
								<span>‘​‌‘​‌</span>
								<p>{{$testimonial->texte}}</p>
								<div class="client-info">
									<div class="avatar">
										<img src="/storage/{{$testimonial->image}}" alt="">
									</div>
									<div class="client-name">
										<h2>{{$testimonial->auteur}}</h2>
										<p>{{$testimonial->fonction}}</p>
									</div>
								</div>
							</div>
						@endforeach
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
				<?php $i=1; ?>
				@if (isset($teams))
					@foreach ($teams as $team)
						<div class="col-sm-4 d-flex order-{{$i}}">
							<div class="member">
								<img src="/storage/{{$team->image}}" alt="">
								<h2>{{$team->nom}}</h2>
								<h3>{{$team->fonction}}</h3>
								<?php $i = $i+2; ?>
							</div>
						</div>
					@endforeach
				@else
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
				@endif
				@if ($leaders != null)
					@foreach ($leaders as $leader)
						<div class="col-sm-4 d-flex order-2">
							<div class="member">
								<img src="/storage/{{$leader->image}}" alt="">
								<h2>{{$leader->nom}}</h2>
								<h3>{{$leader->fonction}}</h3>
							</div>
						</div>
					@endforeach
				@endif
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
						<a href="#top" class="site-btn btn-2">{{isset($bouton) != null ? $bouton->texte : 'browse'}}</a>
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