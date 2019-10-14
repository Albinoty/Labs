@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Page Home</h1>
@stop

@section('content')
    <div class="container">
        <h3>Cette page est reservé a l'édition textuel de la page Home</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <form action="{{url('/home/index/update')}}" method="POST" enctype="multipart/form-data">    
            @csrf
            @method('put')
            <div class="form-group">
                <label for="logo">Logo qui se situe dans la nav</label>
                <input type="file" class="form-control" name="logo" id="logo">
            </div>
            <div class="form-group">
                <label for="logo_carousel">Logo pour le carousel</label>
                <input type="file" class="form-control" name="logo_carousel" id="logo_carousel">
            </div>
            <div class="form-group">
                <label for="texte_carousel">Zone texte du carousel</label>
                <input type="text" class="form-control" name="texte_carousel" id="texte_carousel" value="{{ isset($home) != null ? $home->texte_carousel : ''}}">
            </div> 
            <div class="form-group">
                <label for="texte_gauche">Zone texte de gauche entre les services et video</label>
                <textarea name="texte_gauche" id="texte_gauche" cols="30" rows="10" class="form-control">{{ isset($home) != null ? $home->texte_gauche : ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="texte_droite">Zone texte de gauche entre les services et video</label>
                <textarea name="texte_droite" id="texte_droite" cols="30" rows="10" class="form-control">{{ isset($home) != null ? $home->texte_droite : ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="video">URL d'une video youtube (Il faudra juste copier le lien de la video)</label>
                <input type="text" class="form-control" name="video" id="video" value="{{ isset($home) != null ? $home->url_video : ''}}">
            </div>
            <button class="btn btn-success d-block mx-auto mb-5">Enregistrer</button>
        </form>
    </div>
@stop
