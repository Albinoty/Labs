@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Ajout d'un image pour le carousel</h1>
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
        <form action="{{route('medias.store')}}" method="POST" enctype="multipart/form-data">    
            @csrf
            @method('post')
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name="titre" id="" value="{{old('titre')}}">
            </div>
            <div class="form-group">
                <label for="photo">Image</label>
                <input type="file" class="form-control" name="image" id="">
            </div>
            
            <button class="btn btn-success d-block mx-auto mb-5">Enregistrer</button>
        </form>
    </div>
@stop
