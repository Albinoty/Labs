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
    @if ($errors->any())
    <div class="alert alert-danger" id="msg">
        <div>
            <button type="button" class="ml-2 mb-1 close" id="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
    @endif
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
                    @if (count($smartphone) != null)
                        {{-- {{dd($smartphone)}} --}}
                        @for ($i = 0; $i <= 2; $i++)
                            <div class="icon-box light left">
                                <div class="service-text">
                                    <h2>{{$smartphone[$i]->titre}}</h2>
                                    <p>
                                        @if (strlen($smartphone[$i]->description)>88)
                                            {{substr($smartphone[$i]->description,0,87)}}...
                                        @else
                                            {{$smartphone[$i]->description}}
                                        @endif
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="{{$smartphone[$i]->logo}}"></i>
                                </div>
                            </div>
                        @endfor
                    @else
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
                    @endif
                </div>
                <!-- Devices -->
                <div class="col-md-4 col-sm-4 devices">
                    <div class="text-center">
                        <img src="img/device.png" alt="">
                    </div>
                </div>
                <!-- feature item -->
                <div class="col-md-4 col-sm-4 features">
                    @if (isset($smartphone) != null && count($smartphone)>3)
                        @for ($i = 3; $i <= 5; $i++)
                            <div class="icon-box light left">
                                <div class="service-text">
                                    <h2>{{$smartphone[$i]->titre}}</h2>
                                    <p>
                                        @if (strlen($smartphone[$i]->description)>88)
                                            {{substr($smartphone[$i]->description,0,87)}}...
                                        @else
                                            {{$smartphone[$i]->description}}
                                        @endif
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="{{$smartphone[$i]->logo}}"></i>
                                </div>
                            </div>
                        @endfor
                    @else
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
                    @endif
                </div>
            </div>
            <div class="text-center mt100">
                <a href="#top" class="site-btn">{{isset($bouton) != null ? $bouton->texte : 'browse'}}</a>
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
