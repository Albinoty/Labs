@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Creation d'user</h1>
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
        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="nom">Nom et Prénom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" value={{old('password')}}>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" >
                    <option value="admin">Admin</option>
                    <option value="editeur">Éditeur</option>
                    <option value="guest" selected="selected">Guest</option>
                </select>
            </div>
            <div class="form-group">
                <label for="img_user">Image Profil</label>
                <input type="file" class="form-control" id="img_user" name="img_user">
            </div>
            <div class="form-group">
                <label for="bio">Biographie</label>
                <textarea name="bio" id="bio" cols="30" rows="10" class="form-control">{{old('bio')}}</textarea>
            </div>
            <button class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@stop