@extends('adminlte::page')

@section('title', 'Enturmação')

@section('content_header')

    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="">Enturmação</a></li>
    </ol>
    <div class="col-md-12">
        <h1>Enturmação</h1>
    </div>
@endsection

@section('content')
    <aside class="col-md-12">
        <br/><br/>
    </aside>

    <div class="col-md-7">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group col-md-3">
                    {!! Form::open(array('url'=>"#")) !!}
                    {!! Form::select('turma', [
                    '1' => '1º Ano',
                    '2' => '2º Ano',
                    '3' => '3º Ano',
                    '4' => '4º Ano',
                    '5' => '5º Ano'], null, ['placeholder' => 'Selecione a série','class'=>'form-control']); !!}
                </div>
                <div class="col-md-3">
                    <select class="select-year form-control" name="year">
                        <option></option>
                        @foreach($degrees as $degree)
                            <option value="{{$degree->year}}"> {{$degree->year}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="select-degree form-control" name="degree_turma">
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>Buscar alunos</button>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $('select[name=turma]').change(function () {
            var serie = $(this).val();

            $.get('/admin/test/' + serie, function (degree) {
                $('select[name=degree_turma]').empty();
                $.each(degree,function (key,value) {
                    $('select[name=degree_turma]').append('<option value='+ value.id + '>' + value.year + '</option>')
                });
            });
        });
    </script>
@endsection
