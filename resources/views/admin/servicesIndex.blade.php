@extends('adminlte::page')
@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Services</h1>
@stop

@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Logo</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{$service->id}}</td>
                        <td><i class="{{$service->logo}} logo"></i></td>
                        <td>{{$service->titre}}</td>
                        <td>{{$service->description}}</td>
                        <td class="d-flex justify-content-center">
                            <form action="{{route('services.edit',$service->id)}}">
                                @csrf
                                @method('get')
                                <button class="btn btn-warning mx-2">Update</button>
                            </form>
                            <form action="{{route('services.destroy',$service->id)}}" method="POST">
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
