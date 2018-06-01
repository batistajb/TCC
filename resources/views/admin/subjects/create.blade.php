@extends('adminlte::page')
@section('title', 'Disciplinas')
@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('subjects.index')}}"><i class="fa fa-group"></i> Disciplinas</a></li>
        <li><i class="fa fa-plus"></i> <a href="">Nova Disciplina</a></li>
    </ol>
@stop


@section('content')
    <div class="box-header">
        <h1 class="box-tile">Inserir disciplina</h1>
    </div>

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dados_disciplina" aria-controls="dados_disciplina" role="tab"
                                                  data-toggle="tab">Dados Disciplina</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="dados_disciplina" role="tabpanel">
            <div class="container-fluid col-md-12 box box-body">
                <div class="content">
            @if(Request::is("*/edit"))
                {!! Form::model($subject,['method'=>'PATCH','url'=>'admin/subjects/'.$subject->id]) !!}
                        @include('admin.form.dadosDisciplina')
            @else
                {!! Form::open(array('url'=>route('subjects.store'))) !!}
                        @include('admin.form.dadosDisciplina')
            @endif
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
