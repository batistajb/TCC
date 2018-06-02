@extends('adminlte::page')

@section('title', 'Matrículas')
@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><i class="fas ion-compose"></i> <a href="">Rematrículas</a></li>
    </ol>
@stop

@section('content')
    <div class="col-md-12">
        <h1 class="box-tile">Gerenciamento de Rematrículas</h1>
    </div>
    <aside class="col-md-12">
        <br/>
    </aside>
    <div class="row">
        <div class="col-md-12">
            <h3 class="box-tile" style="text-align: center">Concluir matrícula</h3>
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
                                <th>Aluno(a)</th>
                                <th>Idade</th>
                                <th>Ano/Série</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->birth}}</td>
                                    <td>{{$student->serie}}º ano</td>
                                    <td>
                                        <a href="enroll/{{$student->id}}/edit" class="btn btn-success">
                                            <i class="ion-android-checkbox-outline"></i>Matrícular</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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