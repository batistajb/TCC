<div class="form-group col-md-12">
    <div class="form-group col-md-6">
        <div class="form-group col-md-12">
            <a>{!! Form::label('', 'Matrícula escolar'); !!}</a>
        </div>
        <div class="form-group col-md-6">
            {!! Form::select('serie', [
            '1' => '1º Ano',
            '2' => '2º Ano',
            '3' => '3º Ano',
            '4' => '4º Ano',
            '5' => '5º Ano'], null, ['placeholder' => 'Série de interesse','class'=>'form-control']); !!}
        </div>
        <div class="form-group col-md-4">
            <select class="select-degree form-control" name="degree_id"></select>
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="form-group col-md-12">
            <a>{!! Form::label('', 'Responsável legal pelo Aluno'); !!}</a>
        </div>

        <div class="form-group col-md-12">
            <ul class="nav nav-tabs">
                <li role="presentation">
                    <a href="#mother" aria-controls="responsible" role="tab" data-toggle="tab">
                        Mãe</a></li>
                <li role="presentation">
                    <a href="#father" aria-controls="responsible" role="tab" data-toggle="tab">
                        Pai</a></li>
                <li role="presentation"><a href="#responsible" aria-controls="responsible" role="tab" data-toggle="tab">Outro</a>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="tab-content">
                <div class="tab-pane active" id="mother" role="tabpanel">
                    <div class="form-group col-md-1">
                        {!! Form::checkbox('mother',1,null); !!}Mãe
                    </div>
                </div>
                <div class="tab-pane" id="father" role="tabpanel">
                    <div class="form-group col-md-1">
                        {!! Form::checkbox('father',2,null); !!}Pai
                    </div>
                </div>
                <div class="tab-pane" id="responsible" role="tabpanel">
                    <div class="form-group col-md-4">
                        {!! Form::text('name_responsible',null,['class'=>'form-control','placeholder'=>'Nome do responsável:']) !!}
                    </div>
                    <div class="form-group col-md-3">
                        {!! Form::text('kinship',null,['class'=>'form-control','placeholder'=>'Parentesco:']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group col-md-12">
    <div class="alert alert-warning">
        <h4>{!! Form::label('', 'AUTORIZAÇÃO DE DIVULGAÇÃO DE IMAGEM'); !!}</h4>
        <p>Autorizo a produção/reprodução de videos e fotografias vinculados a imagem da criança, bem como a divulgação nas mídias sociais, não recebendo para tanto quaquer tipo de remuneração, desde que não cause constrangimento para a criança.</p>
        <a>{!! Form::checkbox('divulgation',1,null); !!}NÃO ACEITO</a><BR/>
        <a>{!! Form::checkbox('divulgation',0,null); !!}ACEITO</a>
    </div>
</div>
