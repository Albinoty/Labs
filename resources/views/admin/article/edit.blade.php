@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Editer l'article</h1>
@stop

@section('content')
    <div class="container pb-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
        <form action="{{route('articles.update',$article->id)}}" method="POST" enctype="multipart/form-data">    
            @csrf
            @method('put')
            <div class="form-group">
                <label for="titre">Titre de l'article</label>
                <input type="text" class="form-control" name="titre" id="titre" value="{{$article->titre}}">
            </div>
            <div class="form-group">
                    <label for="image">Image de l'article</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <img src="/storage/{{$article->img_article}}" class="img-fluid" alt="">
                </div>
            <div class="form-group">
                <label for="texte">Contenu du texte</label>
                <textarea name="texte" id="texte" cols="30" rows="10" class="form-control">{{$article->texte}}</textarea>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <span class="d-block mb-3">Tags</span>
                        @if (isset($tags) == null)
                            <p>Il n'y pas de tags, aller en <a href="{{route('tags.create')}}">rajouter</a></p>
                        @else
                            @foreach ($tags as $tag)
                                <span class="d-flex">
                                    <input type="checkbox" name="tags[]" id="" class="d-block my-auto mr-2" value="{{$tag->id}}"
                                    @foreach ($articleTags as $articleTag)
                                        @if ($articleTag->tag_id == $tag->id)
                                            checked
                                        @else
                                            
                                        @endif
                                    @endforeach/>
                                    {{$tag->nom}}
                                </span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-6">
                        <span class="d-block mb-3">Catégorie</span>
                        @if (isset($categories) == null)
                            <p>Il n'y pas de categories, aller en <a href="{{route('categories.create')}}">rajouter</a></p>
                        @else
                            <select name="categorie" id="" class="form-control">
                                @foreach ($categories as $categorie)
                                    <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            </div>

            <button class="btn btn-success d-block mx-auto mb-5">Enregistrer</button>
        </form>
    </div>
@stop
