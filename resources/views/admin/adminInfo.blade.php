@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Information</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{url('/home/info/update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nom">Nom et Prénom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="img_user">Image Profil</label>
                <input type="file" class="form-control" id="img_user" name="img_user">
                @if (substr($user->img_user,0,6) == "images")
                    <img src="/storage/{{$user->img_user}}" alt="" class="d-block w-25">
                @else
                    <img src="/img/avatar/john-doe.png" alt="" class="d-block w-25">
                @endif
            </div>
            <div class="form-group">
                <label for="bio">Biographie</label>
                <textarea name="bio" id="bio" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@stop