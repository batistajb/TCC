<div class="form-group col-md-4 {{$errors->has('name') ? 'has-error': ''}}">
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nome:']) !!}
    @if($errors->has('name'))
        <span class="help-block">
            {{$errors->first('name')}}
        </span>
    @endif
</div>

<div class="form-group col-md-3 {{$errors->has('c_h')? 'has-error': ''}}">
    {!! Form::number('c_h',null,['class'=>'form-control','placeholder'=>'Carga horária:']) !!}
    @if($errors->has('c_h'))
        <span class="help-block">
            {{$errors->first('c_h')}}
        </span>
    @endif
</div>
<div class="form-group col-md-2 {{$errors->has('serie') ? 'has-error': ''}}">
    {!! Form::select('serie', ['1' => '1º Ano','2' => '2º Ano','3' => '3º Ano','4' => '4º Ano','5' => '5º Ano'], null, ['placeholder' => 'Série/Ano','class'=>'form-control']); !!}
    @if($errors->has('serie'))
        <span class="help-block">
            {{$errors->first('serie')}}
        </span>
    @endif
</div>
<div class="form-group col-md-12">
    <hr/>
    <a class="btn btn-primary" href="{{route('subjects.index')}}">Voltar</a>

    <button class="btn btn-success" type="submit"> Salvar</button>
</div>