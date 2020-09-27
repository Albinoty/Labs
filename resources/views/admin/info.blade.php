@extends('adminlte::page')

@section('title', 'Info personnel')

@section('content_header')
    <h1>Information</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('info.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nom">Nom et Prénom</label>
                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{$user->name}}">
                @error('nom')
                    <span class="text-danger font-italic">{{$message}}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col-6">
                    @if ($user->img_user !== null)
                        <img src="{{asset("/storage/".$user->img_user)}}" alt="" class="d-block mx-auto w-50">
                    @else
                        <img src="{{asset('/img/avatar/john-doe.png')}}" alt="" class="d-block mx-auto w-50">
                    @endif
                </div>
                <div class="col-6 form-group">
                    <label for="img_user">Image Profil</label>
                    <input type="file" class="form-control @error('img_user') is-invalid @enderror" id="img_user" name="img_user">
                    @error('img_user')
                        <span class="text-danger font-italic">{{$message}}</span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <label for="bio">Biographie</label>
                <textarea name="bio" id="bio" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@stop