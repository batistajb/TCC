<div class="form-group col-md-4 {{$errors->has('name') ? 'has-error': ''}}">
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nome:']) !!}
    @if($errors->has('name'))
        <span class="help-block">
            {{$errors->first('name')}}
        </span>
    @endif
</div>

<div class="form-group col-md-4 {{$errors->has('email') ? 'has-error': ''}}">
    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Digite seu email:']) !!}
    @if($errors->has('email'))
        <span class="help-block">
            {{$errors->first('email')}}
        </span>
    @endif
</div>

<div class="form-group col-md-4 {{$errors->has('cpf') ? 'has-error': ''}}">
    {!! Form::text('cpf',null,['class'=>'form-control','placeholder'=>'CPF:']) !!}
    @if($errors->has('cpf'))
        <span class="help-block">
            {{$errors->first('cpf')}}
        </span>
    @endif
</div>

<div class="form-group col-md-12 ">
    <hr/>
    <a>Criar senha</a>
</div>
<div class="form-group col-md-2 {{$errors->has('password') ? 'has-error': ''}}">
    {!! Form::password('password',['class'=>'form-control','placeholder'=>'Digite uma senha:']) !!}
    @if($errors->has('password'))
        <span class="help-block">
            {{$errors->first('password')}}
        </span>
    @endif
</div>
<div class="form-group col-md-2 {{$errors->has('pass2') ? 'has-error': ''}}">
    {!! Form::password('pass2',['class'=>'form-control','placeholder'=>'Confirmar senha:']) !!}
    @if($errors->has('pass2'))
        <span class="help-block">
            {{$errors->first('pass2')}}
        </span>
    @endif
</div>
<div class="form-group col-md-6">
    <div class="form-group col-md-5 {{$errors->has('access') ? 'has-error': ''}}">
        {!! Form::select('access', ['1' => 'Administrador','2' => 'Auxiliar Administrativo'], null, ['placeholder' => 'Perfil','class'=>'form-control']); !!}
        @if($errors->has('access'))
            <span class="help-block">
            {{$errors->first('access')}}
        </span>
        @endif
    </div>
</div>
<div class="form-group col-md-12">
    <hr/>
    <a class="btn btn-danger" href="{{route('users.index')}}">Cancelar</a>
    <button class="btn btn-success"> Salvar</button>
</div>