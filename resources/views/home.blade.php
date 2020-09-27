@extends('adminlte::page')

@section('title', 'Labs - Home')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Bievenue {{Auth::user()->name}}</p>
@stop
