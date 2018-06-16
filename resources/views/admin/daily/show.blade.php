@extends('adminlte::page')

@section('title', 'Diário')

@section('content_header')
    <ol class="breadcrumb">
        <li><a href="{{route("dashboard")}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route("dailies.index")}}"><i class="fa fa-archive"></i>Diários/Turmas</a></li>
        <li><i class="fa fa-edit"></i>Diário</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box-header">
                <h1 class="box-tile">Gerenciamento dos diários
                </h1>
                <div class="col-md-4">
                    <a href="{{route('dailies.index')}}" class="btn btn-success">
                        <i class="ion-ios-arrow-back"></i> Voltar</a>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(array('url'=>route('dailies.confirm'))) !!}

    <div class="container-fluid col-md-8">
        @include('admin.enturm.table-info')
    </div>
    <div class="box-default">
        <div class="container-fluid col-md-12">
            <hr/><h3><a><i class="ion ion-ios-list-outline"></i> Alunos da turma</a><br/></h3>
        </div>
        <div class="container-fluid col-md-10">
            <div class="container-fluid">
                <table id="tInfo" class="table table-striped table-bordered fixed">
                    <thead>
                    <tr>
                        <th>Aluno</th>
                        <th>Data de nasc.</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($student_teams as $student_team)
                        @foreach($student_team->students as $student)
                            <tr>
                                <td>{{$student->name}}</td>
                                <td>{{$student->birth}}</td>
                                @if($student->status == 0)
                                    <td>Em curso</td>
                                @endif
                                @if($student->status == 1)
                                    <td>Reprovado</td>
                                @endif
                                @if($student->status == 2)
                                    <td>Aprovado</td>
                                @endif
                                <td>
                                    <a href="dailies/{{$student->id}}/edit" class="btn btn-primary">
                                        <i class="ion-edit"></i> Lançar</a>
                                </td>
                            </tr>
                        @endforeach
                    @empty
                            <th>Nenhum registro cadastrado!</th>
                            <th/>
                            <th/>
                            <th/>
                            <th/>
                    @endforelse
                    <th><hr/>
                        <input type="hidden" value="{{$degree->year}}" name="year"/>
                        <input type="hidden" value="{{$degree->id}}" name="degree"/>
                        <input type="hidden" value="{{$team->id}}" name="team"/>
                        <button type='submit' class="btn btn-success">
                            <i class="ion-checkmark"></i>Concluir Lançamentos</button>
                    </th>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

    @if (session('status'))
        <script>
            confirm("{{session('status')}}");
        </script>
    @endif

@endsection