@extends('templates.index')

@section('head')
    @include('templates.head')
@endsection

@section('header')
    @include('templates.header')
@endsection

@section('chemin')
    @include('templates.chemin')
@endsection

@section('contenu')
    @include('templates.services')
    <!-- features section -->
    <div class="team-section spad">
        <div class="overlay"></div>
        <div class="container">
            <div class="section-title">
                <h2>Get in <span>the Lab</span> and discover the world</h2>
            </div>
            <div class="row">
                <!-- feature item -->
                <div class="col-md-4 col-sm-4 features">
                    <div class="icon-box light left">
                        <div class="service-text">
                            <h2>Get in the lab</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur ad ipiscing elit. Curabitur leo est, feugiat nec</p>
                        </div>
                        <div class="icon">
                            <i class="flaticon-002-caliper"></i>
                        </div>
                    </div>
                    <!-- feature item -->
                    <div class="icon-box light left">
                        <div class="service-text">
                            <h2>Projects online</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur ad ipiscing elit. Curabitur leo est, feugiat nec</p>
                        </div>
                        <div class="icon">
                            <i class="flaticon-019-coffee-cup"></i>
                        </div>
                    </div>
                    <!-- feature item -->
                    <div class="icon-box light left">
                        <div class="service-text">
                            <h2>SMART MARKETING</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur ad ipiscing elit. Curabitur leo est, feugiat nec</p>
                        </div>
                        <div class="icon">
                            <i class="flaticon-020-creativity"></i>
                        </div>
                    </div>
                </div>
                <!-- Devices -->
                <div class="col-md-4 col-sm-4 devices">
                    <div class="text-center">
                        <img src="img/device.png" alt="">
                    </div>
                </div>
                <!-- feature item -->
                <div class="col-md-4 col-sm-4 features">
                    <div class="icon-box light">
                        <div class="icon">
                            <i class="flaticon-037-idea"></i>
                        </div>
                        <div class="service-text">
                            <h2>Get in the lab</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur ad ipiscing elit. Curabitur leo est, feugiat nec</p>
                        </div>
                    </div>
                    <!-- feature item -->
                    <div class="icon-box light">
                        <div class="icon">
                            <i class="flaticon-025-imagination"></i>
                        </div>
                        <div class="service-text">
                            <h2>Projects online</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur ad ipiscing elit. Curabitur leo est, feugiat nec</p>
                        </div>
                    </div>
                    <!-- feature item -->
                    <div class="icon-box light">
                        <div class="icon">
                            <i class="flaticon-008-team"></i>
                        </div>
                        <div class="service-text">
                            <h2>SMART MARKETING</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur ad ipiscing elit. Curabitur leo est, feugiat nec</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt100">
                <a href="" class="site-btn">Browse</a>
            </div>
        </div>
    </div>
    <!-- features section end-->


    <!-- services card section-->
    <div class="services-card-section spad">
        <div class="container">
            <div class="row">
                <!-- Single Card -->
                @foreach ($projets as $projet)
                    <div class="col-md-4 col-sm-6">
                        <div class="sv-card">
                            <div class="card-img">
                                <img src="/storage/{{$projet->image}}" alt="">
                            </div>
                            <div class="card-text">
                                <h2>{{$projet->titre}}</h2>
                                <p>{{$projet->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- services card section end-->
@endsection


@section('newsletter')
    @include('templates.newsletter')
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
