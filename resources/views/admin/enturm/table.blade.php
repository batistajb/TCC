<div class="container-fluid col-md-12">
    <div class="container-fluid col-md-12">
        <h3 class="box-title">RESUMO</h3>
    </div><hr/>
    <div class="col-md-9  form-group">
        <div class="col-md-12 control-label">
            <div class="col-md-12">
                <label for="team_id"><h3><a>Série: </a>{{$team->serie}}º ano</h3></label>
                <input type="hidden" value="{{$team->serie}}" name="serie"/>
            </div>
            <div class="col-md-12">
                <label for="team_id"><h3><a>Grade Escolar: </a>{{$degree->year}}</h3></label>
                <input type="hidden" value="{{$degree->id}}" name="degree_id"/>
            </div>
            <div class="col-md-12">
                <label for="team_id"><h3><a>Turma Escolhida: </a>{{$team->name}}</h3></label>
                <input type="hidden" value="{{$team->id}}" name="team_id"/>
            </div>
        </div>
    </div>
</div>