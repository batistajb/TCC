@extends('adminlte::page')
@section('title', 'Turmas')
@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('team.index')}}"><i class="fa fa-group"></i> Turmas</a></li>
        <li><i class="fa fa-plus"></i> <a href="">Nova Turma</a></li>
    </ol>
@stop


@section('content')
    <div class="box-header">
        <h1 class="box-tile">Inserir Turma</h1>
    </div>

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dados_disciplina" aria-controls="dados_disciplina" role="tab"
                                                  data-toggle="tab">Dados Turma</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="dados_disciplina" role="tabpanel">
            <div class="container-fluid col-md-12 box box-body">
                <div class="content">
            @if(Request::is("*/edit"))
                {!! Form::model($team,['method'=>'PATCH','url'=>'admin/team/'.$team->id]) !!}
                        @include('admin.form.dadosTurma')
            @else
                {!! Form::open(array('url'=>route('team.store'))) !!}
                        @include('admin.form.dadosTurma')
            @endif
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
