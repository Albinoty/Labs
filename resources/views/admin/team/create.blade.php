@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Ajout d'un membre de la team</h1>
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
        <form action="{{route('teams.store')}}" method="POST" enctype="multipart/form-data">    
            @csrf
            @method('post')
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{old('nom')}}">
            </div>
            <div class="form-group">
                <label for="fonction">Fonction</label>
                <input type="text" name="fonction" id="fonction" class="form-control" value="{{old('fonction')}}">
            </div>
            @php
                $isTeamLeader = false;

                foreach($teams as $team){
                    if($team->teamleader == "Oui")
                        $isTeamLeader = true;
                }
            @endphp
            @if (!$isTeamLeader == true)
                <div class="form-group d-flex flex-column">
                    <label for="">Team Leader</label>
                    <span><input type="radio" name="teamleader" id="teamleader" value="Oui"> Oui</span>
                    <span><input type="radio" name="teamleader" id="teamleader" value="Non" checked> Non</span>
                </div>
            @else
                <input type="hidden" name="teamleader" id="teamleader" value="Non">
            @endif
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button class="btn btn-success d-block mx-auto mb-5">Enregistrer</button>
        </form>
    </div>
@stop
