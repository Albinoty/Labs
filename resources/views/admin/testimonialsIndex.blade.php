@extends('adminlte::page')
@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>testimonials</h1>
@stop

@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Photo</th>
                    <th class="text-center">Auteur</th>
                    <th class="text-center">Fonction</th>
                    <th class="text-center">Texte</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonials as $testimonial)
                    <tr>
                        <td>{{$testimonial->id}}</td>
                        <td><img src="/storage/{{$testimonial->image}}" class="w-50 d-block mx-auto"></td>
                        <td>{{$testimonial->auteur}}</td>
                        <td>{{$testimonial->fonction}}</td>
                        <td>{{$testimonial->texte}}</td>
                        <td class="d-flex justify-content-center">
                            <form action="{{route('testimonials.edit',$testimonial->id)}}">
                                @csrf
                                @method('get')
                                <button class="btn btn-warning mx-2">Update</button>
                            </form>
                            <form action="{{route('testimonials.destroy',$testimonial->id)}}" method="POST">
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
