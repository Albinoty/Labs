@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    
    <p>Hello, {{$user->name}}.You are logged in!</p>
@stop
