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
    <div class="col-md-12">
        <h1>Diário : {{$student->name}}</h1>
    </div>
    <aside class="col-md-12">
        <br/>
    </aside>
    <div class="row">
        <div class="box-default">
            <div class="col-md-2"></div>
            <div class="container-fluid col-md-8">
                <div class="container-fluid">
                    <div class="box-body table-responsive no-padding">
                        <table id="alunosMatriculados" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th><h4><a>Disciplinas</a></h4></th>
                                <th><h4><a>Carga horária</a></h4></th>
                                <th><h4><a>Nota</a></h4></th>
                                <th><h4><a>Frequencia</a></h4></th>
                                <th><h4><a>Status</a></h4></th>
                                <th><h4><a>Ação</a></h4></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($dailies as $daily)
                                    @foreach($daily->subjects as $subject)
                                        <tr>
                                            <td>{{$subject->name}}</td>
                                            <td>{{$subject->c_h}} H/A</td>
                                            <td>{{$daily->note}} Pontos</td>
                                            <td>{{$daily->frequency}}%</td>
                                                @if($daily->status == 2)
                                                <td><a style="color: blue">Aprovado</a></td>
                                                @elseif($daily->status == 1)
                                                <td><a style="color: red">Reprovado</a></td>
                                                @elseif($daily->status == 0)
                                                    <td>Em curso</td>
                                                @endif
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#delete" data-whatever="{{$subject->id}}">
                                                    <i class="ion-archive"></i> Lançar
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <hr/>
                            {!! Form::open(array('url'=>route('dailies.store'))) !!}
                                <input type="hidden" value="{{$student->id}}" name="student_id"/>
                                <input type="hidden" value="{{$year}}" name="year"/>
                                <button type='submit' class="btn btn-success">Concluir</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(array('url'=>route('dailies.subject','test'))) !!}
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
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="col-md-6 form-group">
                                <input type="text" name="note" class="form-control" placeholder="Nota"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="frequency" class="form-control" placeholder="Presença"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <input type="hidden" name="subject_id" id="cat_id" value=""/>
                            <input type="hidden" value="{{$student->id}}" name="student_id"/><hr/>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    @if (session('status'))
        <script>
            confirm("{{session('status')}}")
        </script>
    @endif

@stop

@section('adminlte_js')
    <script type="text/javascript">
        function refresh(){
            window.location.reload()
        }
    </script>
@endsection