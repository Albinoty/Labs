@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Medias</h1>
@stop

@section('content')
    <div class="container">
        <table class="table table-hover @if(!empty($medias))table-responsive @endif">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">titre</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medias as $media)
                    <tr>
                        <td>{{$media->id}}</td>
                        <td>{{$media->titre}}</td>
                        <td><img src="/storage/{{$media->img_path}}" class="w-50 d-block mx-auto"></td>
                        <td class="d-flex justify-content-center">
                            <form action="{{route('medias.edit',$media->id)}}">
                                @csrf
                                @method('get')
                                <button class="btn btn-warning mx-2">Update</button>
                            </form>
                            <form action="{{route('medias.destroy',$media->id)}}" method="POST">
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
