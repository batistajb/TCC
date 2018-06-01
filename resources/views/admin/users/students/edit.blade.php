@extends('adminlte::page')
@section('title', 'Alunos')
@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('students.index')}}"><i class="fa fa-group"></i>Alunos</a></li>
        <li><i class="fa fa-plus"></i>Editar alunos</li>
    </ol>
@endsection


@section('content')
    <div class="box-header">
        <h1 class="box-tile">Editar aluno</h1>
    </div>
    @include('admin.users.students.create')
@stop