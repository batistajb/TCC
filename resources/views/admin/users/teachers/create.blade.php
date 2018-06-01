@extends('adminlte::page')

@section('title', 'Professores')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('teacher.index')}}"><i class="fa fa-group"></i>Professores</a></li>
        <li><i class="fa fa-plus"></i>Inserir professores</li>
    </ol>
@endsection

@section('content')
    <div class="box-header">
        <h1 class="box-tile">Inserir professores</h1>
    </div>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dados_pessoais" aria-controls="dados_pessoais" role="tab"
                                                  data-toggle="tab">Dados Pessoais</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="dados_pessoais" role="tabpanel">
            <div class="container-fluid col-md-12 box box-body">
                <div class="content">
                    @if(Request::is("*/edit"))
                        {!! Form::model($teachers,['method'=>'PATCH','url'=>'admin/teacher/'.$teachers->id]) !!}
                    @else
                        {!! Form::open(array('url'=>route('teacher.store'))) !!}
                    @endif
                        @include('admin.form.dadosPessoais')
                        <div class="form-group col-md-12">
                            <a class="btn btn-danger" href="{{route('teacher.index')}}">Cancelar</a>
                            <button class="btn btn-success"> Salvar</button>
                            {{Form::close()}}
                        </div>
                </div>
            </div>
        </div>
    </div>
@stop