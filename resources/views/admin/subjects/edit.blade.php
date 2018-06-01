@extends('adminlte::page')
@section('title', 'Disciplinas')
@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('subjects.index')}}"><i class="fa fa-group"></i> Disciplinas</a></li>
        <li><i class="fa fa-edit"></i> <a href="">Editar Disciplina</a></li>
    </ol>
@stop

@section('content')
@include('admin.subjects.create')
@stop