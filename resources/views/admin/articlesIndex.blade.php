@extends('adminlte::page')
@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Articles</h1>
@stop

@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">titre</th>
                    <th class="text-center">Text</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Tags</th>
                    <th class="text-center">Catégorie</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td>{{$article->titre}}</td>
                        <td>{{$article->texte}}</td>
                        <td><img src="/storage/{{$article->img_article}}" class="w-50 d-block mx-auto"></td>
                        <td>
                            @foreach ($articleTags as $articleTag)
                                @if ($articleTag->article_id == $article->id)
                                    <span class="badge badge-primary">
                                        @foreach ($tags as $tag)
                                            @if($articleTag->tag_id == $tag->id)
                                                <span class="badge badge-primary">
                                                    {{$tag->nom}}
                                                </span>
                                            @endif
                                        @endforeach
                                    </span>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($categories as $categorie)
                                @if ($categorie->id == $article->id_categorie)
                                    {{$categorie->nom}}
                                @endif
                            @endforeach
                        </td>
                        <td class="d-flex justify-content-center">
                            <form action="{{route('articles.edit',$article->id)}}">
                                @csrf
                                @method('get')
                                <button class="btn btn-warning mx-2">Update</button>
                            </form>
                            <form action="{{route('articles.destroy',$article->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger mx-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
