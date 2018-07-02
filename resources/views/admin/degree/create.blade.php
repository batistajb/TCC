@extends('adminlte::page')

@section('title', 'Grades')
@section('content_header')

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{route('degree.index')}}"><i class="fas ion-grid"></i>Grades</a></li>
        <li><i class="fa fa-plus"></i> <a href="">Nova Grade</a></li>
    </ol>
@stop


@section('content')
    <div class="box-header">
        <h1 class="box-tile">Inserir grade</h1>
    </div>

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dados_disciplina" aria-controls="dados_disciplina" role="tab"
                                                  data-toggle="tab">Dados Grade</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="dados_disciplina" role="tabpanel">
            <div class="content">
                {!! Form::open(array('url'=>route('degree.store'))) !!}
                @include('admin.form.dadosGrade');
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section('adminlte_js')
<script type="text/javascript">
    $('select[name=series]').change(function () {
        var serie = $(this).val();
        console.log(serie);
        /*requisição na tabela das turmas*/
        $.get('/admin/ajax-subjects/' + serie, function (subjects) {
            $('select[id=subject_id').empty();
            $.each(subjects, function (key, value) {
                $('select[id=subject_id').append('<option value=' + value.id + '>' + value.name + '</option>')
            });
        });
    });

    $('.select-team').select2({
        placeholder: "Séries",
        allowClear:"true"
    });
    $('.select-subjects').select2({
        placeholder: "Disciplinas",
        allowClear:"true"
    });
    </script>
@endsection
