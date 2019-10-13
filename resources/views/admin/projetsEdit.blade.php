@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Modifier le projet {{$projet->titre}}</h1>
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
        <form action="{{route('projets.update',$projet->id)}}" method="POST" enctype="multipart/form-data">    
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name="titre" id="" value="{{$projet->titre}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$projet->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="photo">Image du projet</label>
                <input type="file" class="form-control" name="image" id="">
                @if($projet->photo !== "")
                    <img src="/storage/{{$projet->image}}" alt="">
                @endif
            </div>
            <button class="btn btn-success d-block mx-auto mb-5">Enregistrer</button>
        </form>
    </div>
@stop
