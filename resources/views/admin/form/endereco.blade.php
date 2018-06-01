<div class="form-group col-md-12">
    <hr/>
    <a>{!! Form::label('', 'Endereço atual'); !!}</a>
</div>
<div class="form-group col-md-5 {{$errors->has('street') ? 'has-error': ''}}">
    {!! Form::text('street',null,['class'=>'form-control','placeholder'=>'Rua:']) !!}
    @if($errors->has('street'))
        <span class="help-block">
            {{$errors->first('street')}}
        </span>
    @endif
</div>
<div class="form-group col-md-2 {{$errors->has('number') ? 'has-error': ''}}">
    {!! Form::number('number',null,['class'=>'form-control','placeholder'=>'Número:']) !!}
    @if($errors->has('number'))
        <span class="help-block">
            {{$errors->first('number')}}
        </span>
    @endif
</div>
<div class="form-group col-md-3 {{$errors->has('district') ? 'has-error': ''}}">
    {!! Form::text('district',null,['class'=>'form-control','placeholder'=>'Bairro:']) !!}
    @if($errors->has('district'))
        <span class="help-block">
            {{$errors->first('district')}}
        </span>
    @endif
</div>
<div class="form-group col-md-3 {{$errors->has('city') ? 'has-error': ''}}">
    {!! Form::text('city',null,['class'=>'form-control','placeholder'=>'Cidade:']) !!}
    @if($errors->has('city'))
        <span class="help-block">
            {{$errors->first('city')}}
        </span>
    @endif
</div>
<div class="form-group col-md-2 {{$errors->has('state') ? 'has-error': ''}}">
    {!! Form::text('state',null,['class'=>'form-control','placeholder'=>'UF:']) !!}
    @if($errors->has('state'))
        <span class="help-block">
            {{$errors->first('state')}}
        </span>
    @endif
</div>
<div class="form-group col-md-4 {{$errors->has('tel') ? 'has-error': ''}}">
    {!! Form::text('tel',null,['class'=>'form-control','placeholder'=>'Telefone:']) !!}
    @if($errors->has('tel'))
        <span class="help-block">
            {{$errors->first('tel')}}
        </span>
    @endif
</div>