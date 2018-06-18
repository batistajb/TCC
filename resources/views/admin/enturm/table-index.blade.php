<div class="container-fluid col-md-12"><hr/>
    <div class="container-fluid col-md-12">
        {{--<a class="btn btn-primary" href="{{route('enturm.list')}}">Listagem das enturmações</a>--}}
    </div><hr/>
    <div class="container-fluid col-md-12"><hr/>
        <div class="col-md-8  form-group">
            <div class="col-md-4 {{$errors->has('serie') ? 'has-error': ''}}">
                {!! Form::select('serie',
                    ['1'                => '1º Ano',
                    '2'                 => '2º Ano',
                    '3'                 => '3º Ano',
                    '4'                 => '4º Ano',
                    '5'                 => '5º Ano'],null,
                    ['placeholder'      => 'Série/Ano',
                    'class'             =>'select-series form-control']);!!}
                @if($errors->has('serie'))
                    <span class="help-block">{{$errors->first('serie')}}</span>
                @endif
            </div>
            <div class="col-md-4 {{$errors->has('team_id') ? 'has-error': ''}}">
                <select class="select-team form-control" name="team_id"></select>
                @if($errors->has('team_id'))
                    <span class="help-block">{{$errors->first('team_id')}}</span>
                @endif
            </div>
            <div class="col-md-4">
                <select class="select-degree form-control" name="degree_id"></select>
            </div>
        </div>
        <div class="col-md-4 input-group">
            <button class="btn btn-success" type="submit"><i class="fa fa-search"></i>Buscar alunos</button>
        </div>
    </div>
</div>