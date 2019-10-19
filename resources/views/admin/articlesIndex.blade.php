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
                    @if (auth()->user()->role == "admin")                        
                    <th class="text-center">Id</th>
                    <th class="text-center">Auteur</th>
                    @endif
                    <th class="text-center">Titre</th>
                    <th class="text-center">Text</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Publier</th>
                    <th class="text-center">Tags</th>
                    <th class="text-center">Catégorie</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    @if (Auth()->user()->role == "admin")
                        <tr>
                            <td>{{$article->id}}</td>    
                            @foreach ($users as $user)
                                @if ($article->id_user == $user->id)
                                    <td>{{$user->name}}</td>                 
                                @endif
                            @endforeach       
                            <td>{{$article->titre}}</td>
                            <td>{{$article->texte}}</td>
                            <td class="w-25"><img src="/storage/{{$article->img_article}}" class="d-block mx-auto"></td>
                            <td>
                                @if ($article->etat == "Pending")
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                                @if ($article->etat == "Publié")
                                    <span class="badge badge-success">Publié</span>
                                @endif
                            </td>
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
                    @endif
                    @if(Auth()->user()->role == "editeur" && Auth()->user()->id == $article->id_user)
                        <tr>
                            <td>{{$article->titre}}</td>
                            <td>{{$article->texte}}</td>
                            <td>
                                <img src="/storage/{{$article->img_article}}" class="w-50 d-block mx-auto">
                            </td>
                            <td>
                                @if ($article->etat == "Pending")
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                                @if ($article->etat == "Publié")
                                    <span class="badge badge-success">Publié</span>
                                @endif
                            </td>
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
                                @if ($article->etat == "Publié")
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
                                @else
                                    <p>Votre est en cours de validation</p>
                                @endif
                                
                            </td>
                        </tr> 
                    @endif                      
                @endforeach
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="col-12 d-flex justify-content-center">
            {{$articles->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@stop
