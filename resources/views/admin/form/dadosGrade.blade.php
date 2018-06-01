<div class="form-group col-md-4 {{$errors->has('year') ? 'has-error': ''}}">
    {!! Form::number('year',null,['class'=>'form-control','placeholder'=>'Ano da grade'])!!}
    @if($errors->has('year'))
        <span class="help-block">
            {{$errors->first('year')}}
        </span>
    @endif
</div>

<div class="form-group col-md-3 {{$errors->has('series') ? 'has-error': ''}}">
    <select class="select-turmas form-control" name="series">
            <option></option>
            <option value="1">1º Ano</option>
            <option value="2">2º Ano</option>
            <option value="3">3º Ano</option>
            <option value="4">4º Ano</option>
            <option value="5">5º Ano</option>
    </select>
    @if($errors->has('series'))
        <span class="help-block">
            {{$errors->first('series')}}
        </span>
    @endif
</div>

<div class="form-group col-md-4 {{$errors->has('subject_id') ? 'has-error': ''}}">
    <select class="select-disciplinas form-control" name="subject_id[]" multiple="multiple">
            <option></option>
        @foreach($subjects as $subject)
            <option value="{{$subject->id}}">{{$subject->name}}</option>
        @endforeach
    </select>
    @if($errors->has('subject_id'))
        <span class="help-block">
            {{$errors->first('subject_id')}}
        </span>
    @endif
</div>

<div class="form-group col-md-12">
    <hr/>
    <a class="btn btn-danger" href="{{route('degree.index')}}">Cancelar</a>
    <button type="submit" class="btn btn-success"> Salvar</button>
</div>


