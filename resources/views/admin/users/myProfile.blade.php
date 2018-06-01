@extends('adminlte::page')

@section('title', 'Meu Perfil')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('users.index')}}"><i class="fa fa-user"></i>Usuários</a></li>
        <li><i class="fa fa-plus"></i>Meu Perfil</li>
    </ol>

@endsection


@section('content')
    <div class="box-header">
        <h1 class="box-tile">Meu Perfil</h1>
    </div>

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dados_login" aria-controls="dados_login" role="tab"
                                                  data-toggle="tab">Perfil</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="dados_login" role="tabpanel">
            <div class="content">
                {!! Form::model(auth()->user(),['method'=>'PATCH','url'=>'admin/myProfile']) !!}
                @include('admin.form.dadosProfile');
                {!! Form::close() !!}
        </div>
    </div>
    </div>

    @if (session('status'))
        <script>
            confirm("{{session('status')}}");
        </script>
    @endif

@stop