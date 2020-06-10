@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Ajout une Categorie pour les articles</h1>
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
        <form action="{{route('categories.update',$categorie->id)}}" method="POST">    
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nom">Nom du categorie</label>
                <input type="text" class="form-control" value="{{$categorie->nom}}"name="nom" id="nom">
            </div>
            <button class="btn btn-success d-block mx-auto mb-5">Enregistrer</button>
        </form>
    </div>
@stop
