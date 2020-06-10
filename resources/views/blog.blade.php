@extends('layouts.app')

@section('content')

    @include('components.chemin')

    @include('partials.header')

    <!-- page section -->
	<div class="page-section spad">
            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-8 col-sm-7 blog-posts">
                        <!-- Post item -->
                        @php
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
                        @endphp
                        @foreach ($articles as $article)
                            <div class="post-item">
                                <div class="post-thumbnail">
                                    <img src="{{asset("storage/".$article->img_article)}}" alt="">
                                    <div class="post-date">
                                        <h2>{{substr($article->created_at,8,2)}}</h2>
                                        <h3>
                                            @foreach ($mois as $key => $item)
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
                                        <a href="">@foreach ($articleTags as $articleTag)
                                                @foreach ($tags as $tag)
                                                    @if (($articleTag->article_id == $article->id) && ($articleTag->tag_id == $tag->id))
                                                        {{$tag->nom}}
                                                    @endif
                                                @endforeach
                                            @endforeach</a>
                                        <a href="/blog-post/{{$article->id}}/#comments">
                                            @php
                                                $i = 0;

                                                foreach($commentaires as $commentaire){
                                                    if($commentaire->id_article == $article->id)
                                                        $i++;
                                                }
                                                echo $i;

                                            @endphp
                                        Comments</a>
                                    </div>
                                    <p>
                                        @if (strlen($article->texte) >= 150)
                                            {{substr($article->texte,0,149)}}...
                                        @else
                                            {{$article->texte}}
                                        @endif
                                    </p>
                                    <a href="{{route("post.show",[$article->id,$article->slug])}}" class="read-more">Read More</a>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 d-flex">
                            <!-- Pagination -->
                            {{$articles->links('vendor.pagination.bootstrap-4')}}
                        </div>
                    </div>
                    <!-- Sidebar area -->
                    @include('partials.sidebar')                        
                </div>
            </div>
        </div>
        <!-- page section end-->
    
        @include('partials.newsletter')
        
        @include('components.footer')

@endsection
