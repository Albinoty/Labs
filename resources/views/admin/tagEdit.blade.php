@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Ajout un Tag pour les articles</h1>
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
        <form action="{{route('tags.update',$tag->id)}}" method="POST">    
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nom">Nom du tag</label>
                <input type="text" class="form-control" value="{{$tag->nom}}"name="nom" id="nom">
            </div>
            <button class="btn btn-success d-block mx-auto mb-5">Enregistrer</button>
        </form>
    </div>
@stop
