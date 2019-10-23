@extends('adminlte::page')
@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Tags</h1>
@stop

@section('content')
    <div class="container">
        @if (auth()->user()->role != "admin")
            <p>En cas d'erreur sur la creation du tag, <a href="{{url('/contact#con_form')}}">Veuillez contactez l'admin.</a></p>
        @endif
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    @if (auth()->user()->role == "admin")
                        <th>Id</th>
                    @endif
                    <th class="text-center">Nom</th>
                    @if (auth()->user()->role == "admin")
                        <th class="text-center">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        @if (auth()->user()->role == "admin")
                            <td>{{$tag->id}}</td>    
                        @endif
                        <td class="text-center">{{$tag->nom}}</td>
                        @if(Auth::user()->role == "admin")
                            <td class="d-flex justify-content-center">
                                <form action="{{route('tags.edit',$tag->id)}}">
                                    @csrf
                                    @method('get')
                                    <button class="btn btn-warning mx-2">Update</button>
                                </form>
                                <form action="{{route('tags.destroy',$tag->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger mx-2">Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
