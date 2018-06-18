@extends('adminlte::page')

@section('title', 'Turmas')

@section('content_header')

    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="">Alunos</a></li>
    </ol>
@stop

@section('content')
    <hr/>
    <h1 class="header-title">Listagem de alunos</h1>
    <aside class="col-md-12">
        <br/>
    </aside>
    <div class="row">
        <div class="col-md-12">
            <div class="box-header">
                <div class="col-md-4">
                    <div class="col-md-4">
                        @if(empty($student))
                            <a href="{{route('students.create')}}" class="btn btn-success">Novo aluno(a)</a>
                        @else
                            <a href="{{route('students.index')}}" class="btn btn-success">Listar todos</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    {!! Form::open(array('url'=>route('searchStudent')))!!}
                    <div class="input-group input-group-sm" style="width: 450px;">
                        <select class="select-students form-control" name="students">
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
                                <th>Data de Nascimento</th>
                                <th>Responsável</th>
                                <th>Série</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            @if(!empty($student))
                                <tbody>
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->birth}}</td>
                                    <td>{{$student->responsible['name_responsible']}}</td>
                                    <td>{{$student->serie}} ºano</td>
                                    <td>
                                        <a href="students/{{$student->id}}/edit" class="btn btn-primary">
                                            <i class="ion-edit"></i> Editar</a>
                                        @if($student->enroll == 6)
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete" data-whatever="{{$student->id}}"><i
                                                        class="ion-trash-b"></i> Excluir
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                        </table>
                        @else
                            <tbody>
                            @forelse($students as $student)
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->birth}}</td>
                                    <td>{{$student->responsible['name_responsible']}}</td>
                                    <td>{{$student->serie}} ºano</td>
                                    <td>
                                        <a href="students/{{$student->id}}/edit" class="btn btn-primary">
                                            <i class="ion-edit"></i> Editar</a>
                                        @if($student->enroll == 6)
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete" data-whatever="{{$student->id}}"><i
                                                        class="ion-trash-b"></i> Excluir
                                            </button>
                                        @endif
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
                            {{$students->links()}}
                        @endif
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

@section('adminlte_js')
    <script type="text/javascript">
        /*requisição na tabela das turmas*/
        $.get('/admin/students/select', function (students) {
            $.each(students, function (key, value) {
                $('select[name=students]').append('<option value=' + value.id + '>' + value.name + '</option>')
            });
        });
        $('.select-students').select2({
            placeholder: "Buscar aluno",
            allowClear: "true",
            minimumInputLength: 1
        });
    </script>
@stop