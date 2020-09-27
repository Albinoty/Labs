@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Teams</h1>
@stop

@section('content')
    <div class="container">
        <table class="table table-hover @if(!empty($teams))table-responsive @endif">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Photo</th>
                    <th class="text-center">Nom</th>
                    <th class="text-center">Fonction</th>
                    <th class="text-center">Team Leader</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td>{{$team->id}}</td>
                        <td><img src="/storage/{{$team->image}}" class="w-50 d-block mx-auto"></td>
                        <td>{{$team->nom}}</td>
                        <td>{{$team->fonction}}</td>
                        <td>{{$team->teamleader}}</td>
                        <td class="d-flex justify-content-center">
                            <form action="{{route('teams.edit',$team->id)}}">
                                @csrf
                                @method('get')
                                <button class="btn btn-warning mx-2">Update</button>
                            </form>
                            <form action="{{route('teams.destroy',$team->id)}}" method="POST">
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
