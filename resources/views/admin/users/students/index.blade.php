@extends('adminlte::page')

@section('title', 'Turmas')

@section('content_header')

    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="">Alunos</a></li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box-header">
                <h1 class="box-tile">Listagem de alunos</h1>
                <div class="col-md-4">
                    <a href="{{route('students.create')}}" class="btn btn-success">Novo aluno(a)</a>
                </div>
                <div class="col-md-8">
                    <div class="input-group input-group-sm" style="width: 450px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Turmas">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="box-default">
                <div class="container-fluid col-md-12">
                    <div class="container-fluid">
                        <div class="box-body table-responsive no-padding">
                            <table id="tInfo" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Data de Nascimento</th>
                                    <th>Responsável</th>
                                    <th>Série</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                           @foreach($students as $student)
                             <tr>
                                <td>{{$student->name}}</td>
                                <td>{{$student->birth}}</td>
                                <td>{{$student->responsible['name_responsible']}}</td>
                                <td>{{$student->serie}} ºano</td>
                                <td>
                                    <a href="students/{{$student->id}}/edit" class="btn btn-primary">
                                        <i class="ion-edit"></i> Editar</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete" data-whatever="{{$student->id}}"><i
                                                class="ion-trash-b"></i> Excluir
                                    </button>
                                </td>
                            </tr>
                           @endforeach
                            </tbody>
                                {{$students->links()}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal  fade in" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas ion-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('students.destroy','test')}}" method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <div class="modal-body">
                            <h3 class="text-center">Deseja realmente excluir registro?</h3>
                            <input type="hidden" name="category_id" id="cat_id" value=""/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Não, cancelar</button>
                            <button type="submit" class="btn btn-danger">Sim,confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (session('status'))
        <script>
            confirm("{{session('status')}}");
        </script>
    @endif
@stop