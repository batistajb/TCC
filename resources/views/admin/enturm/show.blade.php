@extends('adminlte::page')

@section('title', 'Enturmação')

@section('content_header')

    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="">Enturmação</a></li>
    </ol>
    <div class="col-md-12">
        <h1>Listagem das enturmações</h1>
    </div>
@endsection
@section('content')
    <div class="container-fluid col-md-12">
        <hr/>
        <div class="container-fluid">
            <a class="btn btn-success" href="{{route('enturm.index')}}">Nova Enturmação</a>
            <div class="box-body table-responsive no-padding">
                <table id="tInfo" class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>Turma</th>
                            <th>Série</th>
                            <th>Turno</th>
                            <th>Qtd máx. de alunos</th>
                            <th>Qtd atual de alunos</th>
                            <th>Ano da Grade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($teams as $team)
                        <tr>
                            <td>{{$team->name}}</td>
                            <td>{{$team->serie}}º ano</td>
                            <td>{{$team->shift}}</td>
                            <td>{{$team->qtd_students}}</td>
                            <td>{{$team->studentTeams->last()->qtd}}</td>
                            <td>{{$team->year}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#delete" data-whatever="{{$team->id}}">
                                    <i class="ion-archive"></i> Encerrar
                                </button>
                            </td>
                        </tr>
                    @empty
                        <th>Nenhum registro cadastrado!</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    @endforelse
                    </tbody>
                </table>
                {{$teams->links()}}
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
                    <form action="{{route('enturm.archive')}}" method="post">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <h3 class="text-center">Deseja realmente aquivar registro?</h3>
                            <p class="text-center">Certifique que todos os alunos estajam com as notas e frequencias lançadas!</p>
                            <input type="hidden" name="team_id" id="cat_id" value=""/>
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

