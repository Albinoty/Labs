@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Changer de Role</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <h2 class="my-3">Quelle rôle pour {{$user->name}}?</h2>
            <div class="form-group"><label for="" id="role">Rôle</label>
                <select name="role" id="id" class="form-control">
                    @if ($user->role == "admin")
                        <option value="admin" selected>Admin</option>
                        <option value="editeur">Éditeur</option>
                        <option value="guest">Guest</option>
                    @endif
                    @if ($user->role == "editeur")
                        <option value="admin">Admin</option>
                        <option value="editeur" selected>Éditeur</option>
                        <option value="guest">Guest</option>
                    @endif
                    @if ($user->role == "guest")
                        <option value="admin">Admin</option>
                        <option value="editeur">Éditeur</option>
                        <option value="guest" selected>Guest</option>                        
                    @endif

                </select>
            </div>
            <button class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@stop