@extends('adminlte::page')

@section('title', 'Diário')

@section('content_header')
    <ol class="breadcrumb">
        <li><a href="{{route("dashboard")}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><i class="fa fa-group"></i>Diário</li>
    </ol>
@endsection

@section('content')
    <div class="col-md-12">
        <h1>Diários</h1>
    </div>
    <aside class="col-md-12">
        <br/>
    </aside>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group col-md-3">
                    {!! Form::open(array('url'=>'enturm/store')) !!}
                    {!! Form::select('turma', ['1º' => '1º Ano','2º' => '2º Ano','3º' => '3º Ano','4º' => '4º Ano','5º' => '5º Ano'], null, ['placeholder' => 'turma','class'=>'form-control']); !!}
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>Buscar alunos da turma</button>
                {!! Form::close() !!}
                <hr/>
            </div>
            <div class="col-md-12">
                <h3 class="box-tile">Alunos da {{"#"}} série</h3>
            </div>
            <div class="row">
                <div class="box-default">
                    <div class="container-fluid col-md-12">
                        <div class="container-fluid">
                            <div class="box-body table-responsive no-padding">
                                <table id="alunosMatriculados" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th><h4><a>Série selecionada: {{"#"}}</a></h4></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Idade</th>
                                        <th>Coeficiente da nota</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>66</td>
                                        <td>
                                            <a class="btn btn-success" href="{{route('dailies.create')}}">Lançar</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop