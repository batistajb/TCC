@extends('adminlte::page')

@section('title', 'Enturmação')

@section('content_header')

    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="">Enturmação</a></li>
    </ol>
    <div class="col-md-12">
        <h1>Enturmação</h1>
    </div>
@endsection

@section('content')
    <aside class="col-md-12">
        <br/><br/>
    </aside>

    <div class="col-md-7">
        <div class="row">
                <div class="col-md-12">
                    <div class="form-group col-md-3">
                        {!! Form::open(array('url'=>route('enturm.search'))) !!}
                        {!! Form::select('turma', [
                        '1' => '1º Ano',
                        '2' => '2º Ano',
                        '3' => '3º Ano',
                        '4' => '4º Ano',
                        '5' => '5º Ano'], null, ['placeholder' => 'Selecione a série','class'=>'form-control']); !!}
                    </div>
                    <div class="col-md-3">
                        <select class="select-year form-control" name="year">
                            <option></option>
                            @foreach($degrees as $degree)
                                <option value="{{$degree->year}}">{{$degree->year}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="select-degree form-control" name="degree_turma">
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>Buscar alunos</button>

    @if(Request::url()=='http://'.$_SERVER['HTTP_HOST'].'/admin/enturm/search')
                    <hr/>
                </div>
            <div class="col-md-12">
                <h2 class="box-tile">Alunos do {{$serie}}º ano</h2>
                <hr/>
                <div class="col-md-3">
                    <select class="select-enturm form-control" name="team">
                        <option></option>
                        @foreach($teams as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-success">
                     <i class="fa fa-book"></i>Enturmar</button>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="row">
                <div class="box-default">
                    <div class="container-fluid col-md-12">
                        <div class="container-fluid">
                            <div class="box-body table-responsive no-padding">
                                <table id="alunosMatriculados" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th><h4><a>Série selecionada: {{$serie}}º ano</a></h4></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Idade</th>
                                        <th>Coeficiente da nota</th>
                                        <th>Série</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->birth}}</td>
                                        <td>{{$student->id}}</td>
                                        <td>{{$student->serie}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="box-default">
                <div class="container-fluid col-md-12">
                    <div class="container-fluid">
                        <div class="box-body table-responsive no-padding">
                            <table id="infoTurma" class="table table-striped table-bordered">
                                    <h3><a>{{"Grade ". $serie."º ano/".$year}}</a></h3>
                                <thead>
                                <tr>
                                    <th>Turmas:</th>
                                    <th>Turno:</th>
                                    <th>Qtd máxima de alunos:</th>
                                    <th>Qtd de alunos:</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody id="student_teams">
                            @foreach ($student_teams as $teams)
                                @foreach ($teams->teams as $team)
                                    @foreach ($degrees as $degree_id)
                                      @if(($degree_id->id==$teams->degree_id)
                                                         &&($team->year==$year)
                                                            &&($team->serie==$serie))
                            <tr>
                                <td>{{$team->name}}</td>
                                <td>{{$team->shift}}</td>
                                <td style="text-align: center">{{$team->qtd_students}}</td>

                                <td style="text-align: center">{{$teams->qtd}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('enturm.details')}}">Ver</a>
                                </td>
                            </tr>
                                    @endif
                                @endforeach
                             @endforeach
                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(Request::url()=='http://'.$_SERVER['HTTP_HOST'].'/admin/enturm')

    @endif
    @if (session('status'))
        <script>
            confirm("{{session('status')}}");
        </script>
    @endif
@stop

