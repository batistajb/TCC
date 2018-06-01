<div class="form-group col-md-12">
    <hr/>
    <a>{!! Form::label('', 'Filiação'); !!}</a>
</div>
<div class="form-group col-md-5">
    {!! Form::text('name_mother',null,['class'=>'form-control','placeholder'=>'Nome da mãe:']) !!}
</div>
<div class="form-group col-md-5">
    {!! Form::text('name_father',null,['class'=>'form-control','placeholder'=>'Nome do pai:']) !!}
</div>

<div class="form-group col-md-2">
    {!! Form::text('nis',null,['class'=>'form-control','placeholder'=>'Número NIS:']) !!}
</div>
