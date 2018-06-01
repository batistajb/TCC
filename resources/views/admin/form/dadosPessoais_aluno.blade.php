<div class="form-group col-md-6 {{$errors->has('name') ? 'has-error': ''}}">
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nome:']) !!}
    @if($errors->has('name'))
        <span class="help-block">
            {{$errors->first('name')}}
        </span>
    @endif
</div>

<div class="form-group col-md-3 {{$errors->has('sex') ? 'has-error': ''}}">
    {!! Form::select('sex', ['0' => 'Masculino', '1' => 'Feminino'], null, ['placeholder' => 'Sexo','class'=>'form-control']); !!}
    @if($errors->has('sex'))
        <span class="help-block">
            {{$errors->first('sex')}}
        </span>
    @endif
</div>

<div class="form-group col-md-3 {{$errors->has('naturalness') ? 'has-error': ''}}">
    {!! Form::text('naturalness',null,['class'=>'form-control','placeholder'=>'Naturalidade:']) !!}
    @if($errors->has('naturalness'))
        <span class="help-block">
            {{$errors->first('naturalness')}}
        </span>
    @endif
</div>

<div class="form-group col-md-2 {{$errors->has('uf') ? 'has-error': ''}}">
    {!! Form::text('uf',null,['class'=>'form-control','placeholder'=>'UF:']) !!}
    @if($errors->has('uf'))
        <span class="help-block">
            {{$errors->first('uf')}}
        </span>
    @endif
</div>

<div class="form-group col-md-3 {{$errors->has('nationality') ? 'has-error': ''}}">
    {!! Form::text('nationality',null,['class'=>'form-control','placeholder'=>'Nacionalidade:']) !!}
    @if($errors->has('nationality'))
        <span class="help-block">
            {{$errors->first('nationality')}}
        </span>
    @endif
</div>

<div class="form-group col-md-2 {{$errors->has('color') ? 'has-error': ''}}">
    {!! Form::text('color',null,['class'=>'form-control','placeholder'=>'Cor:']) !!}
    @if($errors->has('color'))
        <span class="help-block">
            {{$errors->first('color')}}
        </span>
    @endif
</div>

<div class="form-group col-md-4 {{$errors->has('birth') ? 'has-error': ''}}">
    {!! Form::label('birth', 'Data de nascimento'); !!}
    {!! Form::date('birth', \Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Data de nascimento:']) !!}
    @if($errors->has('birth'))
        <span class="help-block">
            {{$errors->first('birth')}}
        </span>
    @endif
</div>
<div class="form-group col-md-12 {{$errors->has('street') ? 'has-error': ''}}">
    <hr/>
    <a>{!! Form::label('', 'Informações da certidão de nascimento'); !!}</a>
</div>
<div class="form-group col-md-4 {{$errors->has('certificate_number') ? 'has-error': ''}}">
    {!! Form::text('certificate_number',null,['class'=>'form-control','placeholder'=>'Número:']) !!}
    @if($errors->has('certificate_number'))
        <span class="help-block">
            {{$errors->first('certificate_number')}}
        </span>
    @endif
</div>

<div class="form-group col-md-4 {{$errors->has('certificate_leaf') ? 'has-error': ''}}">
    {!! Form::text('certificate_leaf',null,['class'=>'form-control','placeholder'=>'Livro/Folha:']) !!}
    @if($errors->has('certificate_leaf'))
        <span class="help-block">
            {{$errors->first('certificate_leaf')}}
        </span>
    @endif
</div>

<div class="form-group col-md-4 {{$errors->has('certificate_register') ? 'has-error': ''}}">
    {!! Form::text('certificate_register',null,['class'=>'form-control','placeholder'=>'Cartório:']) !!}
    @if($errors->has('certificate_register'))
        <span class="help-block">
            {{$errors->first('certificate_register')}}
        </span>
    @endif
</div>

<div class="form-group col-md-4 {{$errors->has('certificate_expedition') ? 'has-error': ''}}">
    {!! Form::label('certificate_expedition', 'Expedição',['class' => 'awesome']); !!}
    {!! Form::date('certificate_expedition', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    @if($errors->has('certificate_expedition'))
        <span class="help-block">
            {{$errors->first('certificate_expedition')}}
        </span>
    @endif
</div>

