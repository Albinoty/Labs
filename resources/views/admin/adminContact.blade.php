@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Section Contact</h1>
@stop

@section('content')
    <div class="container">
        <h3>Cette page est reservé a l'édition textuel de la section Contact</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <form action="{{url('/home/contact/update')}}" method="POST" enctype="multipart/form-data">    
            @csrf
            @method('put')
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{isset($contact) != null ? $contact->titre : '' }}">
            </div>
            <div class="form-group">
                <label for="texte">Texte sous le titre</label>
                <textarea name="texte" id="texte" cols="30" rows="10" class="form-control">{{isset($contact) != null ? $contact->texte : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="sous_titre">Sous-titre</label>
                <input type="text" name="sous_titre" id="sous_titre" class="form-control" value="{{ isset($contact) != null ? $contact->sous_titre  : '' }}">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="form-control" value="{{ isset($contact) != null ? $contact->adresse  : '' }}">
            </div>
            <div class="form-group">
                <label for="localite">Localite</label>
                <input type="text" name="localite" id="localite" class="form-control" value="{{ isset($contact) != null ? $contact->localite  : '' }}">
            </div>
            <div class="form-group">
                <label for="numero_gsm">N° de GSM</label>
                <input type="text" name="numero_gsm" id="numero_gsm" class="form-control" value="{{ isset($contact) != null ? $contact->numero_gsm  : '' }}">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="mail" name="email" id="email" class="form-control" value="{{ isset($contact) != null ? $contact->email  : '' }}">
            </div>
            <button class="btn btn-success d-block mx-auto mb-5">Enregistrer</button>
        </form>
    </div>
@stop
