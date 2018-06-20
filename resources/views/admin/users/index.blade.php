@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="#"><i class="fa fa-user"></i>Usuários</a></li>
    </ol>

@stop

@section('content')
    <hr/>
    <h1 class="header-title">Listagem dos usuários</h1>
    <aside class="col-md-12">
        <br/>
    </aside>
    <div class="row">
        <div class="col-md-12">
            <div class="box-header">
                <div class="col-md-4">
                    <div class="col-md-4">
                        @if(empty($user))
                            @can('view-enrollment')
                                <a class="btn btn-success" href="{{route('users.create')}}">Novo Usuário <i
                                            class="ion-person-add"></i></a>
                            @endcan
                        @else
                            <a href="{{route('subjects.index')}}" class="btn btn-success">Listar todos usuários</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    {!! Form::open(array('url'=>route('searchUsers')))!!}
                    <div class="input-group input-group-sm" style="width: 450px;">
                        <select class="select-users form-control" name="users">
                            <option></option>
                        </select>
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    {!! Form::close() !!}
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
                    <div class="box-body table-responsive no-padding">
                        <table id="tInfo" class="table table-hover">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                            @if(!empty($user))
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @can('view-enrollment')
                                        <td>
                                            <a href="users/{{$user->id}}/edit" class="btn btn-primary">
                                                <i class="ion-edit"></i> Editar</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete" data-whatever="{{$user->id}}"><i
                                                        class="ion-trash-b"></i> Excluir
                                            </button>
                                        </td>
                                    @else
                                        <td>Usuário não autorizado</td>
                                    @endcan
                                </tr>
                            @else
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        @can('view-enrollment')
                                            <td>
                                                <a href="users/{{$user->id}}/edit" class="btn btn-primary">
                                                    <i class="ion-edit"></i> Editar</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete" data-whatever="{{$user->id}}"><i
                                                            class="ion-trash-b"></i> Excluir
                                                </button>
                                            </td>
                                        @else
                                            <td>Usuário não autorizado</td>
                                        @endcan
                                    </tr>
                                @empty
                                    <th>Nenhum registro cadastrado!</th>
                                    <th/>
                                    <th/>
                                    <th/>
                                    <th/>
                                @endforelse
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        @endif
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
                    <form action="{{route('users.destroy','test')}}" method="post">
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
@stop


@section('adminlte_js')
    <script type="text/javascript">
        /*requisição na tabela das turmas*/
        $.get('/admin/users/select', function (users) {
            $.each(users, function (key, value) {
                $('select[name=users]').append('<option value=' + value.id + '>' + value.name + '</option>')
            });
        });
        $('.select-users').select2({
            placeholder: "Buscar usuário",
            allowClear: "true",
            minimumInputLength: 1
        });
    </script>
@stop