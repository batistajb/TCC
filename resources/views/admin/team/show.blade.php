@extends('adminlte::page')

@section('title', 'Turmas')

@section('content_header')

    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i><a href="{{route("dashboard")}}">Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="{{route('enturm.index')}}">Turmas</a></li>
        <li><i class="fa fa-edit"></i> <a href="">Editar Turma</a></li>
    </ol>
    <div class="box-default">
        <div class="container-fluid col-md-8">
            <div class="container">
                <div class="box-header">
                    <h1 class="box-tile">Visualizar Turma</h1>
                    <div class="col-md-4">
                        <a href="{{route('enturm.create')}}" class="btn btn-success"><i class="ion-edit"></i> Editar</a>
                    </div>
                </div>
                <div class="box-body">
                    <table id="tTurmas" class="table table-striped table-bordered fixed">
                        <thead>
                        <tr>
                            <th>Aluno(a)</th>
                            <th>Idade</th>
                            <th>Responsável</th>
                            <th>Professor(a)</th>
                            <th>Português</th>
                            <th>Matemática</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Ashton Cox</td>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>
                                <a href="#" class="btn btn-danger"><i class="ion-trash-b"></i> Excluir</a>
                                {{--exclui o aluno da turma--}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop