@extends('adminlte::page')

@section('title', 'Disciplinas')
@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="">Disciplinas</a></li>
    </ol>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box-header">
                <h1 class="box-tile">Listagem de disciplinas</h1>
                <hr/>
                <div class="col-md-4">
                    @if(Request::url()=='http://'.$_SERVER['HTTP_HOST'].'/admin/subjects/search')
                        <a href="{{route('subjects.index')}}" class="btn btn-success">Listar todas disciplinas</a>
                    @else
                        <a href="{{route('subjects.create')}}" class="btn btn-success">Nova disciplina</a>
                    @endif
                </div>
                <div class="col-md-8">
                    <form method="post" action="{{url('admin/subjects/search')}}" class="form-group">
                        {{csrf_field()}}
                        <div class="input-group input-group-sm" style="width: 450px;">
                            <input type="text" name="table_search" class="form-control pull-right"
                                   placeholder="Disciplinas" required="required">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="box-default">
                <div class="container-fluid col-md-1">

                </div>
                <div class="container-fluid col-md-8">
                    <div class="container-fluid">
                        <div class="box-body table-responsive no-padding">
                            <table id="tInfo" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Carga horária</th>
                                    <th>Ano/Série</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $subject)
                                    <tr>
                                        <td>{{$subject->name}}</td>
                                        <td>{{$subject->c_h}}</td>
                                        <td>{{$subject->serie}}º ano</td>
                                        <td>
                                            <a href="subjects/{{$subject->id}}/edit" class="btn btn-primary">
                                                <i class="ion-edit"></i> Editar</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete" data-whatever="{{$subject->id}}"><i
                                                        class="ion-trash-b"></i> Excluir
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
                    <form action="{{route('subjects.destroy','test')}}" method="post">
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

