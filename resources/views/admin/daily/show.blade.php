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
                        <th>Responsável</th>
                        <th>Coeficiente</th>
                        <th>Ações</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($student_teams as $student_team)
                        @foreach($student_team->students as $student)
                            <tr>
                                <td>{{$student->name}}</td>
                                <td>{{$student->responsible['name_responsible']}}</td>
                                <td></td>
                                <td>
                                    <a href="dailies/{{$student->id}}/edit" class="btn btn-primary">
                                        <i class="ion-edit"></i> Lançar</a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
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
                    <div class="col-md-12">
                        <h2 class="text-center">Registro de notas e presenças</h2>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{route('dailies.subject','test')}}" method="post">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="col-md-12">
                                @foreach($degrees as $degree)
                                    @foreach($degree->subjects as $subject)
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="{{$subject->name}}" value="{{$subject->name}}" class="form-control" disabled="disabled"/>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="note" class="form-control" placeholder="Nota"/>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="frequency" class="form-control" placeholder="Presença"/>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-md-12">
                                <input type="hidden" name="student_id" id="cat_id" value=""/>  <hr/>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                            </div>
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