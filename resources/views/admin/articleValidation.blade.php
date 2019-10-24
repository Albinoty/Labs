@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Page Home</h1>
@stop

@section('content')
    <div class="container">
        <h2>Les articles qui doivent être valide</h2>
        @foreach ($articles as $article)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/storage/{{$article->img_article}}" class="card-img" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->titre}}</h5>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            <p class="card-text">{{$article->texte}}</p>
                            <div class="d-flex justify-content-center">
                                <form action="/article/{{$article->id}}/valider" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-success mx-2">Valider</button>
                                </form>
                                <form action="{{route('articles.userModif',$article->id)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-danger mx-2">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop