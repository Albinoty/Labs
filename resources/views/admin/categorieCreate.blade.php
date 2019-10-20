@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Ajout un Categorie pour les articles</h1>
@stop

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        @if(count($categories) >= 6)
        <p>La limite de catégorie est atteint.</p>
        @else
            <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">    
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="nom">Nom du categorie</label>
                    <input type="text" class="form-control" name="nom" id="nom">
                </div>
                <button class="btn btn-success d-block mx-auto mb-5">Enregistrer</button>
            </form>
        @endif
    </div>
@stop
