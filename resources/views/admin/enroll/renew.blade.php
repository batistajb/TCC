@extends('adminlte::page')

@section('title', 'Matrículas')
@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><i class="fas ion-compose"></i> <a href="">Rematrículas</a></li>
    </ol>
@stop

@section('content')

    <div class="col-md-12">
        <h1 class="box-tile">Gerenciamento de Rematrículas</h1>
    </div>
    <aside class="col-md-12">
        <br/>
    </aside>
    <div class="row">
        <div class="col-md-12">
            <div class="box-header">
                <div class="col-md-4">
                    @if(empty($student))
                        <a href="{{route('students.create')}}" class="btn btn-success">Novo aluno(a)</a>
                    @else
                        <a href="{{route('enroll.renew')}}" class="btn btn-success">Listar todos</a>
                    @endif
                </div>
                <div class="col-md-8">
                    {!! Form::open(array('url'=>route('searchEnrollRenew')))!!}
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
        <div class="row">
            <div class="box-default">
                <div class="container-fluid col-md-1">

                </div>
                <div class="container-fluid col-md-8">
                    <div class="container-fluid">
                        <table id="tInfo" class="table table-striped table-bordered fixed">
                            <thead>
                            <tr>
                                <th>Aluno(a)</th>
                                <th>Status</th>
                                <th>Próxima série/ano</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($student))
                                <tr>
                                    <td>{{$student->name}}</td>
                                    @if($student->status == 1)
                                        <td>Reprovado</td>
                                    @else
                                        <td>Aprovado</td>
                                    @endif
                                    <td>{{$student->serie}}º ano</td>
                                    @can('view-enrollment')
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#delete" data-whatever="{{$student->id}}">
                                                <i class="ion-archive"></i>Arquivar
                                            </button>
                                            <a href="{{route('renewEnrollment',$student->id)}}" class="btn btn-primary">
                                                <i class="ion-android-checkbox-outline"></i>Rematrícular</a>
                                        </td>
                                    @else
                                        <td>Usuário não autorizado</td>
                                    @endcan
                                </tr>
                            </tbody>
                            @else
                            @forelse($students as $student)
                                <tr>
                                    <td>{{$student->name}}</td>
                                    @if($student->status == 1)
                                        <td>Reprovado</td>
                                    @else
                                        <td>Aprovado</td>
                                    @endif
                                    <td>{{$student->serie}}º ano</td>
                                    @can('view-enrollment')
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#delete" data-whatever="{{$student->id}}">
                                                <i class="ion-archive"></i>Arquivar
                                            </button>
                                            <a href="{{route('renewEnrollment',$student->id)}}" class="btn btn-primary">
                                                <i class="ion-android-checkbox-outline"></i>Rematrícular</a>
                                        </td>
                                    @else
                                        <td>Usuário não autorizado</td>
                                    @endcan
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
                    <form action="{{route('enroll.low','test')}}" method="post">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <h3 class="text-center">Deseja realmente colocar matrícula na lista de espera?</h3>
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

@endsection


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
            allowClear:"true",
            minimumInputLength:1
        });
    </script>
@stop