@extends('adminlte::page')

@section('title', 'Turmas')

@section('content_header')
    <ol class="breadcrumb">
        <li><a href="{{route("dashboard")}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><i class="fa fa-group"></i>Turmas</li>
    </ol>
@endsection

@section('content')
    <hr/>
    <h1 class="header-title">Listagem das turmas</h1>
    <aside class="col-md-12">
        <br/>
    </aside>
    <div class="row">
        <div class="col-md-12">
            <div class="box-header">
                <div class="col-md-4">
                    <div class="col-md-4">
                        @if(empty($teams))
                            <a href="{{route('team.create')}}" class="btn btn-success">Nova turma</a>
                        @else
                            <a href="{{route('team.index')}}" class="btn btn-success">Listar turmas</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    {!! Form::open(array('url'=>route('searchTeam')))!!}
                    <div class="input-group input-group-sm" style="width: 450px;">
                        <select class="select-teams form-control" name="teams">
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
                                <th>Série</th>
                                <th>Nome</th>
                                <th>Professor</th>
                                <th>Qtd máx. de alunos</th>
                                <th>Turmo</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($teams as $team)
                            <tr>
                                <td>{{$team->serie}} ºano</td>
                                <td>{{$team->name}}</td>
                                <td>{{$team->teacher->name}}</td>
                                <td>{{$team->qtd_students}} Alunos</td>
                                <td>{{$team->shift}}</td>
                                <td>
                                    <a href="team/{{$team->id}}/edit" class="btn btn-primary">
                                        <i class="ion-edit"></i> Editar</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete" data-whatever="{{$team->id}}"><i
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
                                <th/>
                            @endforelse
                            </tbody>
                        </table>
                        @if(empty($teams))
                        {{$teams->links()}}
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
                    <form action="{{route('team.destroy','test')}}" method="post">
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
        $.get('/admin/team/select', function (teams) {
            $.each(teams, function (key, value) {
                $('select[name=teams]').append('<option value=' + value.year + '>' + value.year + '</option>')
            });
        });
        $('.select-teams').select2({
            placeholder: "Buscar ano da turma",
            allowClear: "true",
            minimumInputLength: 1
        });
    </script>
@stop