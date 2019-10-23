@extends('adminlte::page')
@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Categories</h1>
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
                        <th class="text-center">Id</th>
                    @endif
                        <th class="text-center">Nom</th>
                    @if (auth()->user()->role == "admin")
                        <th class="text-center">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $categorie)
                    <tr>
                        @if (auth()->user()->role == "admin")
                            <td class="text-center">{{$categorie->id}}</td>
                        @endif
                        <td class="text-center">{{$categorie->nom}}</td>
                        @if (auth()->user()->role == "admin")
                            <td class="d-flex justify-content-center">
                                <form action="{{route('categories.edit',$categorie->id)}}">
                                    @csrf
                                    @method('get')
                                    <button class="btn btn-warning mx-2">Update</button>
                                </form>
                                <form action="{{route('categories.destroy',$categorie->id)}}" method="POST">
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
