@extends('adminlte::page')
@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Tags</h1>
@stop

@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    @if (auth()->user()->role == "admin")
                        <th>Id</th>
                    @endif
                    <th>Nom</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        @if (auth()->user()->role == "admin")
                            <td>{{$tag->id}}</td>    
                        @endif
                        <td>{{$tag->nom}}</td>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
