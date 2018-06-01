@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('users.index')}}"><i class="fa fa-user"></i>Usuários</a></li>
        <li><i class="fa fa-plus"></i>Inserir usuários</li>
    </ol>

@endsection

@section('content')
    <div class="box-header">
        <h1 class="box-tile">Inserir usuários</h1>
    </div>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dados_login" aria-controls="dados_login" role="tab"
                                                  data-toggle="tab">Login</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="dados_login" role="tabpanel">
            <div class="content">
            @if(Request::is("*/edit"))
                {!! Form::model($users,['method'=>'PATCH','url'=>'admin/users/'.$users->id]) !!}
                @include('admin.form.dadosLogin');
                {!! Form::close() !!}
            @else
                {!! Form::open(array('url'=>route('users.store'))) !!}
                @include('admin.form.dadosLogin');
                {!! Form::close() !!}
            @endif
            </div>
        </div>
    </div>

    @if (session('status'))
        <script>
            confirm("{{session('status')}}");
        </script>
    @endif

@stop