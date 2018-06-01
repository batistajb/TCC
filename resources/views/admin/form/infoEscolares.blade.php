<div class="form-group col-md-12">
    <hr/>
    <a>{!! Form::label('', 'Informações da procedência escolar'); !!}</a>
</div>
<div class="form-group col-md-6">
    {!! Form::text('escola',null,['class'=>'form-control','placeholder'=>'Nome da escola:']) !!}
</div>
<div class="form-group col-md-3">
    {!! Form::text('redeEnsino',null,['class'=>'form-control','placeholder'=>'Rede de ensino:']) !!}
</div>
<div class="form-group col-md-2">
    {!! Form::select('tipoEnsino', ['educacaoInfantil' => 'Ed. Infantil','fundamental1' => 'Fundamental I','fundamental2' => 'Fundamental II'], null, ['placeholder' => 'Tipo de ensino','class'=>'form-control']); !!}
</div>
<div class="form-group col-md-12">
    <hr/>
    <a>{!! Form::label('', 'Situação escolar'); !!}</a>
</div>
<div class="form-group col-md-2">
    {!! Form::select('interesse', ['1º' => '1º Ano','2º' => '2º Ano','3º' => '3º Ano','4º' => '4º Ano','5º' => '5º Ano'], null, ['placeholder' => 'Série de interesse','class'=>'form-control']); !!}
</div>
<div class="form-group col-md-2">
    {!! Form::select('sintuacaoA', ['aprovado' => 'Aprovado','reprovado' => 'Reprovado','evasao' => 'Evasão'], null, ['placeholder' => 'Situação anterior','class'=>'form-control']); !!}
</div>
<div class="form-group col-md-2">
    {!! Form::select('sintuacaoAtual', ['aprovado' => 'Aprovado','reprovado' => 'Reprovado','evasao' => 'Evasão'], null, ['placeholder' => 'Situação atual','class'=>'form-control']); !!}
</div>
<div class="form-group col-md-12">
    <hr/>
    <a>{!! Form::label('', 'Histórico'); !!}</a>
</div>
<div class="form-group col-md-2">
    {!! Form::select('grade', ['grade1' => 'Grade 1ºano','reprovado' => 'Grade 2ºano','evasao' => 'Grade 3ºano'], null, ['placeholder' => 'Grade escolar','class'=>'form-control']); !!}
</div>
