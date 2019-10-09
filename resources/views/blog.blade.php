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
    <!-- page section -->
	<div class="page-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-7 blog-posts">
                        <!-- Post item -->
                        <div class="post-item">
                            <div class="post-thumbnail">
                                <img src="img/blog/blog-2.jpg" alt="">
                                <div class="post-date">
                                    <h2>03</h2>
                                    <h3>Nov 2017</h3>
                                </div>
                            </div>
                            <div class="post-content">
                                <h2 class="post-title">Just a simple blog post</h2>
                                <div class="post-meta">
                                    <a href="">Loredana Papp</a>
                                    <a href="">Design, Inspiration</a>
                                    <a href="">2 Comments</a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.</p>
                                <a href="/blog-post" class="read-more">Read More</a>
                            </div>
                        </div>
                        <!-- Post item -->
                        <div class="post-item">
                            <div class="post-thumbnail">
                                <img src="img/blog/blog-1.jpg" alt="">
                                <div class="post-date">
                                    <h2>03</h2>
                                    <h3>Nov 2017</h3>
                                </div>
                            </div>
                            <div class="post-content">
                                <h2 class="post-title">Just a simple blog post</h2>
                                <div class="post-meta">
                                    <a href="">Loredana Papp</a>
                                    <a href="">Design, Inspiration</a>
                                    <a href="">2 Comments</a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.</p>
                                <a href="/blog-post" class="read-more">Read More</a>
                            </div>
                        </div>
                        <!-- Post item -->
                        <div class="post-item">
                            <div class="post-thumbnail">
                                <img src="img/blog/blog-3.jpg" alt="">
                                <div class="post-date">
                                    <h2>03</h2>
                                    <h3>Nov 2017</h3>
                                </div>
                            </div>
                            <div class="post-content">
                                <h2 class="post-title">Just a simple blog post</h2>
                                <div class="post-meta">
                                    <a href="">Loredana Papp</a>
                                    <a href="">Design, Inspiration</a>
                                    <a href="">2 Comments</a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.</p>
                                <a href="/blog-post" class="read-more">Read More</a>
                            </div>
                        </div>
                        <!-- Pagination -->
                        <div class="page-pagination">
                            <a class="active" href="">01.</a>
                            <a href="">02.</a>
                            <a href="">03.</a>
                        </div>
                    </div>
                    <!-- Sidebar area -->
                    @include('templates.sidebar')                        
                </div>
            </div>
        </div>
        <!-- page section end-->
    
@endsection


@section('newsletter')
    @include('templates.newsletter')
@endsection


@section('footer')
    @include('templates.footer')
@endsection
