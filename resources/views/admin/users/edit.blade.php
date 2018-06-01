@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('users.index')}}"><i class="fa fa-user"></i>Usuários</a></li>
        <li><i class="fa fa-plus"></i>Editar usuário</li>
    </ol>

@endsection


@section('content')
    <div class="box-header">
        <h1 class="box-tile">Editar usuário</h1>
    </div>
    @include('admin.users.create')
@stop