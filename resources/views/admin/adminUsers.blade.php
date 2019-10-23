@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Tous les users du blog</h1>
@stop

@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Image Profile</th>
                    <th class="text-center">Nom</th>
                    <th class="text-center">Rôle</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td class="w-25">
                            @if ($user->img_user == null || $user->img_user == 'img/avatar/john-doe.png')
                                <img src="/img/avatar/john-doe.png" class="w-50 d-block mx-auto">
                            @else
                                <img src="/storage/{{$user->img_user}}" class="w-50 d-block mx-auto">
                            @endif
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->email}}</td>
                        <td class="d-flex justify-content-center">
                            <form action="{{route('users.edit',$user->id)}}">
                                @csrf
                                @method('get')
                                <button class="btn btn-warning mx-2">Changer Role</button>
                            </form>
                            <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                @if ($user->id == Auth()->user()->id && Auth()->user()->role == 'admin')                                 
                                @else
                                    <button class="btn btn-danger mx-2">Delete</button>   
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop