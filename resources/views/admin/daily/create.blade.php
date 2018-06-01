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
        <h1>Diário : {{auth()->user()->name}}</h1>
    </div>
    <aside class="col-md-12">
        <br/>
    </aside>
            <div class="row">
                <div class="box-default">
                    <div class="col-md-3">

                    </div>
                    <div class="container-fluid col-md-6">
                        <div class="container-fluid">
                            <div class="box-body table-responsive no-padding">
                                {!! Form::open(array('url'=>'enturm/store')) !!}
                                <table id="alunosMatriculados" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><h4><a>Disciplinas</a></h4></th>
                                            <th><h4><a>Notas</a></h4></th>
                                            <th><h4><a>Presenças</a></h4></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subjects as $subject)
                                        <tr>
                                            <td>{{$subject->name}}</td>
                                            <td>{!! Form::number('nota'.$subject->id,null,['class'=>'form-control','placeholder'=>'Nota']) !!}</td>

                                            <td>{!! Form::number('presenca'.$subject->id,null,['class'=>'form-control','placeholder'=>'Presenças']) !!}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="form-group col-md-12">
                                    <a class="btn btn-success" href="#">Salvar</a>
                                    <a class="btn btn-danger" href="{{route('dailies.index')}}">Cancelar</a>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@stop