@extends('adminlte::page')

@section('title', 'Grades')
@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><i class="fas ion-grid"></i> <a href="">Grade</a></li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box-header">
                <h1 class="box-tile">Listagem das grades escolares</h1>
                <div class="col-md-4">
                    <a href="{{route('degree.create')}}" class="btn btn-success">Nova grade</a>
                </div>
                <div class="col-md-8">
                    <div class="input-group input-group-sm" style="width: 450px;">
                        <input type="text" name="table_search" class="form-control pull-right"
                               placeholder="Disciplinas">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="box-default">
                <div class="container-fluid col-md-1">

                </div>
                <div class="container-fluid col-md-8">
                    <div class="container-fluid">
                        <table id="tInfo" class="table table-striped table-bordered fixed">
                            <thead>
                            <tr>
                                <th>Ano da Grade</th>
                                <th>Ano/Série</th>
                                <th>Disciplinas</th>
                                <th>Ações</th>
                            </tr>

                            </thead>
                            <tbody>
                            @forelse($degrees as $degree)
                                <tr>
                                    <td>{{$degree->year}}</td>
                                    <td>{{$degree->series}} º Ano</td>
                                    <td>
                                        @foreach($degree->subjects as $subject)
                                            |{{$subject->name}}|
                                        @endforeach
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete" data-whatever="{{$degree->id}}"><i
                                                    class="ion-trash-b"></i> Excluir
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                    <th>Nenhum registro cadastrado!</th>
                                    <th/>
                                    <th/>
                                    <th/>
                                @endforelse
                            </tbody>
                        </table>
                        {{$degrees->links()}}
                    </div>
                </div>
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
                    <form action="{{route('degree.destroy','test')}}" method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <div class="modal-body">
                            <h3 class="text-center">Deseja realmente excluir registro?</h3>
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

@endsection