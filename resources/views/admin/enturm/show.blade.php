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
                <table id="tInfo" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Turma</th>
                        <th>Série</th>
                        <th>Qtd de alunos</th>
                        <th>Ano da Grade</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student_teams as $student_team)
                        @foreach($student_team->team as $team)
                            @forelse($student_team->degrees as $degree)
                                <tr>
                                <td>{{$team->name}}</td>
                                <td>{{$student_team->serie}}</td>
                                <td>{{$team->qtd_students}}</td>
                                <td>{{$degree->year}}</td>
                                <td>
                                    <a class="btn btn-primary" href="#">
                                        <i class="ion-eye"></i>Ver</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete" data-whatever="{{$team->id}}">
                                        <i class="ion-trash-b"></i>Excluir
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
                            @endforeach
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
                {{$student_teams->links()}}
            </div>
        </div>
    </div>
    @if (session('status'))
        <script>
            confirm("{{session('status')}}");
        </script>
    @endif
@endsection

