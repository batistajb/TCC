<div class="form-group col-md-2  {{$errors->has('serie') ? 'has-error': ''}}">
    {!! Form::select('serie', ['1' => '1º Ano','2' => '2º Ano','3' => '3º Ano','4' => '4º Ano','5' => '5º Ano'], null, ['placeholder' => 'Ano/Série:','class'=>'form-control']); !!}
    @if($errors->has('serie'))
        <span class="help-block">
            {{$errors->first('serie')}}
        </span>
    @endif
</div>

<div class="form-group col-md-5  {{$errors->has('name') ? 'has-error': ''}}">
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nome da turma'])!!}
    @if($errors->has('name'))
        <span class="help-block">
            {{$errors->first('name')}}
        </span>
    @endif
</div>
<div class="form-group col-md-2  {{$errors->has('qtd_students') ? 'has-error': ''}}">
    {!! Form::number('qtd_students',null,['class'=>'form-control','placeholder'=>'Qtd máxima de alunos:']) !!}
    @if($errors->has('qtd_students'))
        <span class="help-block">
            {{$errors->first('qtd_students')}}
        </span>
    @endif
</div>

<div class="form-group col-md-2  {{$errors->has('shift') ? 'has-error': ''}}">
    {!! Form::select('shift', ['manha' => 'Matutino','vespertino' => 'Vespertino'], null, ['placeholder' => 'Turno:','class'=>'form-control']); !!}
    @if($errors->has('shift'))
        <span class="help-block">
            {{$errors->first('shift')}}
        </span>
    @endif
</div>
<div class="form-group col-md-12">
    <hr/>
    <a>{!! Form::label('teacher_id', 'Professor'); !!}</a>
</div>
<div class="form-group col-md-4 {{$errors->has('teacher_id') ? 'has-error': ''}}">

<select class="select-teacher_id form-control" name="teacher_id">
    <option></option>
    @foreach($teachers as $teacher)
        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
    @endforeach
</select>
    @if($errors->has('teacher_id'))
        <span class="help-block">
            {{$errors->first('teacher_id')}}
        </span>
    @endif
</div>

<div class="form-group col-md-12">
    <hr/>
    <a class="btn btn-danger" href="{{route('team.index')}}">Cancelar</a>
    <button class="btn btn-success">Salvar</button>

</div>
