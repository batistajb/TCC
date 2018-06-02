@extends('adminlte::page')

@section('title', 'Enturmação')

@section('content_header')

    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="">Enturmação</a></li>
    </ol>
    <div class="col-md-12">
        <h1>Gerenciamento das enturmação</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid col-md-7"><hr/>
        <div class="container-fluid">
            <a class="btn btn-primary" href="{{route('enturm.list')}}">Listagem das enturmações</a>
        </div><hr/>
        <div class="col-md-9  form-group">
            <div class="col-md-12">
                <div class="col-md-4">
                    @if($layout==0)
                        {!! Form::open(array('url'=>route('enturm.destroy','test')))!!}
                        {{method_field('DELETE')}}
                    @else
                        {!! Form::open(array('url'=>route('enturm.store')))!!}
                    @endif
                        <select class="select-series form-control" name="serie">
                            <option></option>
                                <option value="1">1º ano</option>
                                <option value="2">2º ano</option>
                                <option value="3">3º ano</option>
                                <option value="4">4º ano</option>
                                <option value="5">5º ano</option>
                        </select>
                </div>
                <div class="col-md-4">
                    <select class="select-team form-control" name="team_id"></select>
                </div>
                <div class="col-md-4">
                    <select class="select-degree form-control" name="degree_id"></select>
                </div>
            </div>
        </div>
        @if($layout==0)
            <div class="col-md-2 input-group-btn">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>Buscar alunos</button>
            </div>
        @else
            <div class="col-md-6 input-group-btn">
                <a class="btn btn-primary" href="{{route('enturm.index')}}"><i class="fa fa-history"></i>Voltar</a>
            </div>
        @endif

    </div>
@if($layout==1)
    <div class="container-fluid col-md-5">
        <table id="infoTurma" class="table table-striped table-bordered">
            <h3>
                <i class="ion ion-information-circled"></i>Informações<br/>
                <a>{{"Grade ". $team->serie."º ano/".$team->name."-".$degree->year}}</a>
            </h3>
            <thead>
                <tr>
                    <th>TURMA</th>
                    <th>PROFESSOR</th>
                    <th>QTD MÁX. DE ALUNOS</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$team->shift}}</td>
                <td>{{$team->teacher->name}}</td>
                {{--@foreach ( $team->studentTeams as $student_team)
                    <td>{{$student_team->qtd}}</td>
                @endforeach--}}
                <td>{{$team->qtd_students}}</td>
            </tr>
            <thead>
                <tr>
                    <th>DISCIPLINAS</th>
                </tr>
            </thead>
            <tr>
                @foreach ( $degree->subjects as $subject)
                    <td>{{$subject->name}}</td>
                @endforeach
               {{-- @foreach ( $team->studentTeams as $student_team)
                    @foreach ( $student_team->degrees as $degree)
                        @foreach ( $degree->subjects as $subject)
                            <td>{{$subject->name}}</td>
                        @endforeach
                    @endforeach
                @endforeach--}}
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
    <div class="row">
        <div class="box-default">
            <div class="container-fluid col-md-12">
                <div class="container-fluid">
                    <div class="box-body table-responsive no-padding">
                        <table id="infoTurma" class="table table-striped table-bordered">
                            <h1><button class="btn btn-success" href="{{route('enturm.store')}}">
                                       ENTURMAR ALUNOS NA TURMA SELECIONADA
                             </button></h1>
                            {{Form::close()}}
                            <thead>
                            <tr>
                                <th>Nome:</th>
                                <th>Série:</th>
                                <th>Coeficiente:</th>
                                <th>Responsável:</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody id="student_teams">
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->serie}}</td>
                                        <td>{{$student->id}}</td>
                                        <td>{{$student->responsible['name_responsible']}}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete" data-whatever="{{$student->id}}">
                                                <i class="ion-close-circled"></i> Lista de espera
                                            </button>
                                        </td>
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
@endif
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
                    <form action="{{route('enroll.destroy','test')}}" method="post">
                        {{method_field('DELETE')}}
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

@stop

@section('js')
    <script type="text/javascript">
        $('select[name=serie]').change(function () {
            var serie = $(this).val();
            /*requisição na tabela das grades*/
            $.get('/admin/ajax-degree/' + serie, function (degree) {
                $('select[name=degree_id]').empty();
                $.each(degree, function (key, value) {
                    $('select[name=degree_id]').append('<option value=' + value.id + '>' + value.year + '</option>')
                });
            });
            /*requisição na tabela das turmas*/
            $.get('/admin/ajax-team/' + serie, function (teams) {
                $('select[name=team_id]').empty();
                $.each(teams, function (key, value) {
                    $('select[name=team_id]').append('<option value=' + value.id + '>' + value.name + '</option>')
                });
            });
        });
    </script>
    <script type="text/javascript">
        $('.select-series').select2({
            placeholder: "Séries",
            allowClear:"true"
        });
        $('.select-team').select2({
            placeholder: "Turmas",
            allowClear:"true"
        });
    </script>
@endsection
