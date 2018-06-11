@extends('adminlte::page')

@section('title', 'Professores')

@section('content_header')

    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="">Professores</a></li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box-header">
                <h1 class="box-tile">Listagem de professores</h1>
                <div class="col-md-4">
                    @if(Request::url()=='http://'.$_SERVER['HTTP_HOST'].'/admin/teacher/search')
                        <a href="{{route('teacher')}}" class="btn btn-success">Listar todos professores</a>
                    @else
                        <a href="{{route('teacher.create')}}" class="btn btn-success">Novo professsor</a>
                    @endif
                </div>
                <div class="col-md-8">
                    <form method="post" action="{{url('admin/teacher/search')}}" class="form-group">
                        <div class="col-md-4">
                            {{csrf_field()}}
                            <select class="select-turmas form-control" name="turma_id">
                                <option></option>
                                @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default inline"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="box-default">
                <div class="container-fluid col-md-12">
                    <div class="container-fluid">
                        <table id="tInfo" class="table table-striped table-bordered fixed">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF:</th>
                                <th>Celular:</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($teachers as $teacher)
                                <tr>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->cpf}}</td>
                                    <td>{{$teacher->tel}}</td>
                                    <td>
                                        <a href="teacher/{{$teacher->id}}/edit" class="btn btn-primary">
                                            <i class="ion-edit"></i> Editar</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete" data-whatever="{{$teacher->id}}"><i
                                                    class="ion-trash-b"></i> Excluir
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <th>Nenhum registro cadastrado!</th>
                                <th/>
                                <th/>
                                <th/>
                                <th/>
                            @endforelse
                            </tbody>
                        </table>
                        {{$teachers->links()}}
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
                    <form action="{{route('teacher.destroy','test')}}" method="post">
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