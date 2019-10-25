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
    <!-- Google map -->
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
	<div class="map" id="map-area">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2518.689591024362!2d4.341348215436429!3d50.855432159865444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c38c275028d3%3A0xc7799151146ebf77!2sMolenGeek!5e0!3m2!1sfr!2sbe!4v1570528410993!5m2!1sfr!2sbe" width="1920" height="750" frameborder="0" allowfullscreen="" class="d-block img-fluid h-100"></iframe>
    </div>
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