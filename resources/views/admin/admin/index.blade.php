@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')

    @if (session('status'))
        <script>
            confirm("{{session('status')}}");
        </script>
    @endif

    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>
@stop
