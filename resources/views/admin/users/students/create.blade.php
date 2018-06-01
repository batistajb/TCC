@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('students.index')}}"><i class="fa fa-group"></i>Alunos</a></li>
        <li><i class="fa fa-plus"></i>Inserir alunos</li>
    </ol>

@endsection

@section('content')
    <div class="box-header">
        <h1 class="box-tile">Inserir alunos</h1>
    </div>

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dados_pessoais" aria-controls="dados_pessoais" role="tab"
                                                  data-toggle="tab">Dados Pessoais</a></li>
        <li role="presentation"><a href="#filiacao" aria-controls="filiacao" role="tab" data-toggle="tab">Filiação</a>
        </li>
        <li role="presentation"><a href="#endereco" aria-controls="endereco" role="tab" data-toggle="tab">Endereço</a>
        </li>
        <li role="presentation"><a href="#matricula" aria-controls="matricula" role="tab" data-toggle="tab">Matricular</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="dados_pessoais" role="tabpanel">
            @if(Request::is("*/edit"))
                {!! Form::model($students,['method'=>'PATCH','url'=>'admin/students/'.$students->id]) !!}
            @else
                {!! Form::open(array('url'=>route('students.store'))) !!}
            @endif
            <div class="container-fluid col-md-12 box box-body">
                <div class="content">
                    @include('admin.form.dadosPessoais_aluno')
                </div>
            </div>
        </div>
        <div class="tab-pane" id="filiacao" role="tabpanel">
            <div class="container-fluid col-md-12 box box-body">
                <div class="content">
                    @include('admin.form.filiacao')
                </div>
            </div>
        </div>
        <div class="tab-pane" id="endereco" role="tabpanel">
            <div class="container-fluid col-md-12 box box-body">
                <div class="content">
                    @include('admin.form.endereco')
                </div>
            </div>
        </div>
        <div class="tab-pane" id="matricula" role="tabpanel">
            <div class="container-fluid col-md-12 box box-body">
                <div class="content">
                    @include('admin.form.matricula')
                    <div class="form-group col-md-12">
                        <a class="btn btn-danger" href="{{route('students.index')}}">Cancelar</a>
                        <button class="btn btn-success"> Salvar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop