@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Page Home</h1>
@stop

@section('content')
<div class="container">
    <form action="{{route('bouton.update',1)}}" method="POST">
        @csrf
        @method('put')
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <div class="form-group">
            <label for="texte_carousel">Le texte du boutton browse</label>
            <input type="text" class="form-control" name="texte" id="texte_carousel" value="{{ isset($bouton) != null ? $bouton->texte : ''}}">
        </div>
        <button class="btn btn-primary mx-auto">Enregistrer</button>
    </form>
</div>
@stop