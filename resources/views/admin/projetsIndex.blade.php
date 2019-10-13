@extends('adminlte::page')
@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Projets</h1>
@stop

@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">titre</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projets as $projet)
                    <tr>
                        <td>{{$projet->id}}</td>
                        <td>{{$projet->titre}}</td>
                        <td><img src="/storage/{{$projet->image}}" class="w-50 d-block mx-auto"></td>
                        <td>{{$projet->description}}</td>
                        <td class="d-flex justify-content-center">
                            <form action="{{route('projets.edit',$projet->id)}}">
                                @csrf
                                @method('get')
                                <button class="btn btn-warning mx-2">Update</button>
                            </form>
                            <form action="{{route('projets.destroy',$projet->id)}}" method="POST">
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
