@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="#"><i class="fa fa-user"></i>Usuários</a></li>
    </ol>

@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box-header">
                <h1 class="box-tile">Listagem de usuários</h1>
                <div class="col-md-4">
                    @can('view-enrollment')
                        <a class="btn btn-success" href="{{route('users.create')}}">Novo Usuário <i
                                    class="ion-person-add"></i></a>
                    @endcan
                </div>
                <div class="col-md-8">
                    <div class="input-group input-group-sm" style="width: 450px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Usuários">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid col-md-12">
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