@extends('adminlte::page')
@section('title', 'Professores')
@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('teacher.index')}}"><i class="fa fa-group"></i> Professores</a></li>
        <li><i class="fa fa-edit"></i> <a href="">Editar Professor</a></li>
    </ol>
@stop

@section('content')
    <div class="box-header">
        <h1 class="box-tile">Editar professores</h1>
    </div>
    @include('admin.users.teachers.create')
@stop