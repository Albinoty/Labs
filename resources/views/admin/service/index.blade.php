@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/adminlte/dist/css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
@endsection

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Services</h1>
@stop

@section('content')
    <div class="container pb-5">
        <table class="table table-hover @if(!empty($services))table-responsive @endif">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col" >Logo</th>
                    <th scope="col" >Titre</th>
                    <th scope="col" >Description</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td scope="row">{{$service->id}}</td>
                        <td><i class="{{$service->logo}} logo" style="font-size: 40px;"></i></td>
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
