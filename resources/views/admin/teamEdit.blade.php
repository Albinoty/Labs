@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Modification d'un membre de la team</h1>
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
        <form action="{{route('teams.update',$team->id)}}" method="POST" enctype="multipart/form-data">    
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{$team->nom}}">
            </div>
            <div class="form-group">
                <label for="fonction">Fonction</label>
                <input type="text" name="fonction" id="fonction" class="form-control" value="{{$team->fonction}}">
            </div>
            <div class="form-group d-flex flex-column">
                <label for="">Team Leader</label>
                    @if ($team->teamleader == "Oui")
                        <span><input type="radio" name="teamleader" id="teamleader" value="Oui" checked> Oui</span>
                        <span><input type="radio" name="teamleader" id="teamleader" value="Non"> Non</span>
                    @else
                        <span><input type="radio" name="teamleader" id="teamleader" value="Oui"> Oui</span>
                        <span><input type="radio" name="teamleader" id="teamleader" value="Non" checked> Non</span>
                    @endif
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button class="btn btn-success d-block mx-auto mb-5">Enregistrer</button>
        </form>
    </div>
@stop
