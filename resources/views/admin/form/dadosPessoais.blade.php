<div class="form-group col-md-4 {{$errors->has('name') ? 'has-error': ''}}">
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nome:']) !!}
    @if($errors->has('name'))
        <span class="help-block">
            {{$errors->first('name')}}
        </span>
    @endif
</div>
<div class="form-group col-md-3 {{$errors->has('cpf') ? 'has-error': ''}}">
    {!! Form::text('cpf',null,['class'=>'form-control','placeholder'=>'CPF:']) !!}
    @if($errors->has('cpf'))
        <span class="help-block">
            {{$errors->first('cpf')}}
        </span>
    @endif
</div>
<div class="form-group col-md-12">
    <hr/>
    <a>Contato</a>
</div>
<div class="form-group col-md-2 {{$errors->has('tel') ? 'has-error': ''}}">
    {!! Form::number('tel',null,['class'=>'form-control','placeholder'=>'Telefone:']) !!}
    @if($errors->has('tel'))
        <span class="help-block">
            {{$errors->first('tel')}}
        </span>
    @endif
</div>
