@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Modification d'un testimonial</h1>
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
        <form action="{{route('testimonials.update',$testimonial->id)}}" method="POST" enctype="multipart/form-data">    
            @csrf
            @method('put')
            <div class="form-group">
                <label for="auteur">Auteur</label>
                <input type="text" name="auteur" id="auteur" class="form-control" value="{{$testimonial->auteur}}">
            </div>
            <div class="form-group">
                <label for="fonction">Fonction</label>
                <input type="text" name="fonction" id="fonction" class="form-control" value="{{$testimonial->fonction}}">
            </div>
            <div class="form-group">
                <label for="texte">Message</label>
                <textarea name="texte" id="texte" cols="30" rows="10" class="form-control">{{$testimonial->texte}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button class="btn btn-success d-block mx-auto mb-5">Enregistrer</button>
        </form>
    </div>
@stop
