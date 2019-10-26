@extends('templates.index')


@section('head')
    @include('templates.head')
@endsection

@section('header')
    @include('templates.header')
@endsection

@section('chemin')
    @include('templates.chemin')
@endsection

@section('contenu')
<div class="page-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7 blog-posts">
                <!-- Single Post -->
                <?php
                    $mois = [
                        '01' => 'Jan',
                        '02' => 'Feb',
                        '03' => 'Mar',
                        '04' => 'Apr',
                        '05' => 'May', 
                        '06' => 'Jun',
                        '07' => 'Jul',
                        '08' => 'Aug',
                        '09' => 'Sep',
                        '10' => 'Oct',
                        '11' => 'Nov',
                        '12' => 'Dec'
                    ]
                ?>
                <div class="single-post">
                    <div class="post-thumbnail">
                        <img src="/storage/{{$article->img_article}}" alt="">
                        <div class="post-date">
                            <h2>{{substr($article->created_at,8,2)}}</h2>
                            <h3>
                                @foreach ($mois as $key => $item )
                                    @if ($key == substr($article->created_at,5,2))
                                        {{$item}}
                                    @endif
                                @endforeach
                                {{substr($article->created_at,0,4)}}
                            </h3>
                        </div>
                    </div>
                    <div class="post-content">
                            <h2 class="post-title">{{$article->titre}}</h2>
                            <div class="post-meta">
                                @foreach ($categories as $categorie)
                                    @if($article->id_categorie == $categorie->id)    
                                        <a href="{{url('/search',$categorie->nom)}}">
                                            {{$categorie->nom}}
                                        </a>
                                    @endif
                                @endforeach
                                @foreach ($articleTags as $articleTag)
                                    @foreach ($tags as $tag)
                                        @if (($articleTag->article_id == $article->id) &&($articleTag->tag_id == $tag->id))
                                        <a href="{{$tag->nom}}">{{$tag->nom}}</a>
                                        @endif
                                    @endforeach
                                @endforeach</a>
                                <a href="">{{count($commentaires)}} Comments</a>
                            </div>
                            <p>
                                {{$article->texte}}
                            </p>
                        </div>
                    <!-- Post Author -->
                    <div class="author">
                        @foreach ($users as $user)
                            @if ($user->id == $article->id_user)
                                <div class="avatar w-25 ">
                                    @if ($user->img_user == null || $user->img_user == "img/avatar/john-doe.png")
                                        <img src="/img/avatar/john-doe.png" class="img-fluid" alt="">
                                    @else
                                        <img src="/storage/{{$user->img_user}}" class="img-fluid" alt="">
                                    @endif
                                </div>
                                <div class="author-info w-75">
                                    <h2>{{$user->name}}, <span>{{$user->role}}</span></h2>
                                    <p>{{$user->bio}}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Post Comments -->
                    <div class="comments" id="comments">
                        <h2>Comments ({{count($commentaires)}})</h2>
                        <ul class="comment-list">
                            @forelse ($commentaires as $commentaire)
                                <li>
                                    <div class="avatar">
                                        @if (substr($commentaire->img_user,0,6) == "images")
                                            <img src="/storage/{{$commentaire->img_user}}" alt="">
                                        @else
                                            <img src="/{{$commentaire->img_user}}" alt="">
                                        @endif
                                    </div>
                                    <div class="commetn-text">
                                        <h3 class="d-flex align-items-center">{{$commentaire->nom}} | 
                                            {{-- date --}}
                                            {{substr($article->created_at,8,2)}}
                                            {{-- mois --}}
                                            @foreach ($mois as $key => $item )
                                                @if ($key == substr($article->created_at,5,2))
                                                    {{$item}}
                                                @endif
                                            @endforeach
                                            {{-- annee --}}
                                            {{substr($article->created_at,0,4)}}
                                            | 
                                            @if(Auth()->user()!= null)
                                                @if (Auth()->user()->email == $commentaire->email || Auth()->user()->role == "admin")
                                                    <form action="/blog-post/{{$commentaire->id}}/commentaire/delete" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn">Delete</button>
                                                    </form>
                                                @endif
                                            @endif
                                        </h3>
                                        <p>{{$commentaire->commentaire}}</p>
                                    </div>
                                </li>
                            @empty
                            <p></p>
                            @endforelse
                        </ul>
                        <div class="col-12 d-flex">
                            {{$commentaires->links('vendor.pagination.bootstrap-4')}}
                        </div>
                    </div>
                    <!-- Commert Form -->
                    @if ($errors->any())
                        <div class="alert alert-danger" id="com">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-9 comment-from">
                            <h2>Leave a comment</h2>
                            <form class="form-class" action="/blog-post/{{$article->id}}/commentaire" method="POST">
                                @csrf
                                @method('post')
                                <div class="row mt-2">
                                    @if(Auth::user() == null)
                                        <div class="col-sm-6">
                                            <input type="text" name="name" placeholder="Your name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="email" placeholder="Your email">
                                        </div>
                                    @else
                                        <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                        <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                    @endif
                                    <div class="col-sm-12">
                                        <textarea name="message" placeholder="Message"></textarea>
                                        <button class="site-btn">send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include('templates.sidebar')
        </div>
    </div>
</div>
@endsection


@section('newsletter')
    @include('templates.newsletter')
@endsection


@section('footer')
    @include('templates.footer')
@endsection
