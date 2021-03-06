@extends('adminlte::page')

@section('title', 'Enturmação')

@section('content_header')

    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="">Enturmar</a></li>
    </ol>
    <div class="col-md-12">
        <h1>Enturmar</h1>
    </div>
@endsection

@section('content')

    <aside class="col-md-12">
        <br/><br/>
    </aside>
    <div class="col-md-12">
        <div class="row">
            <div class="box-default">
                <div class="container-fluid col-md-12">
                    <div class="container-fluid">
                        <div class="box-body table-responsive no-padding">
                            {{--<a class="btn btn-primary" href="{{route('enturm.index')}}">Listagem das enturmação</a>--}}
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
                                                        <a class="btn btn-primary" href="">Ver</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endforeach
                                </tbody>
                                {{$student_teams->links()}}
                            </table>
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
@stop


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
@endsection
