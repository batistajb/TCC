@extends('adminlte::page')

@section('title', 'Professores')

@section('content_header')

    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="">Professores</a></li>
    </ol>
@stop

@section('content')
    <hr/>
    <h1 class="header-title">Listagem de professores</h1>
    <aside class="col-md-12">
        <br/>
    </aside>
    <div class="row">
            <div class="col-md-12">
                <div class="box-header">
                    <div class="col-md-4">
                        <div class="col-md-4">
                            @if(empty($teacher))
                                <a href="{{route('teacher.create')}}" class="btn btn-success">Novo professor(a)</a>
                            @else
                                <a href="{{route('teacher.index')}}" class="btn btn-success">Listar todos</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        {!! Form::open(array('url'=>route('searchTeacher')))!!}
                        <div class="input-group input-group-sm" style="width: 450px;">
                            <select class="select-teachers form-control" name="teachers">
                                <option></option>
                            </select>
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        {!! Form::close() !!}
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
                                <th>CPF:</th>
                                <th>Celular:</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            @if(!empty($teacher))
                                <tbody>
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
                                </tbody>
                        </table>
                            @else
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
                        @endif
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


@section('adminlte_js')
    <script type="text/javascript">
        /*requisição na tabela das turmas*/
        $.get('/admin/teachers/select', function (teachers) {
            $.each(teachers, function (key, value) {
                $('select[name=teachers]').append('<option value=' + value.id + '>' + value.name + '</option>')
            });
        });
        $('.select-teachers').select2({
            placeholder: "Buscar professor",
            allowClear: "true",
            minimumInputLength: 1
        });
    </script>
@stop