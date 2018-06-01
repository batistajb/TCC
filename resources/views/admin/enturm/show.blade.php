@extends('adminlte::page')

@section('title', 'Enturmação')

@section('content_header')

    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="">Enturmação</a></li>
    </ol>
    <div class="col-md-12">
        <h1>Listagem das turmas</h1>
    </div>
@endsection
@section('content')
<div class="col-md-12">
    <hr/>
    <div class="row">
        <div class="box-default">
            <div class="container-fluid col-md-2">

            </div>
            <div class="container-fluid col-md-8">
                <div class="container-fluid">
                    <div class="box-body table-responsive no-padding">
                        <table id="tInfo" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Qtd máxima de alunos</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($student_teams as $student_team)
                                @foreach($student_team->teams as $team)
                                    <tr>
                                        <td>{{$team->name}}</td>
                                        <td>{{$team->id}}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{route('enturm.details')}}">
                                                <i class="ion-eye"></i>Ver</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete" data-whatever="{{$team->id}}">
                                                <i class="ion-trash-b"></i>Excluir
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                        {{$student_teams->links()}}
                    </div>
                </div>
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

