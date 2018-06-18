<table id="infoTurma" class="table table-striped table-bordered">
    <h3><a><i class="ion ion-information-circled"></i>Informações</a><br/></h3>
    <h4>{{"Grade ". $team->serie."º ano/".$team->name."-".$degree->year}}</h4>

    <thead>
    <tr>
        <th>TURMA</th>
        <th>TURNO</th>
        <th>PROFESSOR</th>
        <th>QTD MÁX. DE ALUNOS</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$team->name}}</td>
        <td>{{$team->shift}}</td>
        <td>{{$team->teacher->name}}</td>
        {{--@foreach ( $team->studentTeams as $student_team)
            <td>{{$student_team->qtd}}</td>
        @endforeach--}}
        <td>{{$team->qtd_students}}</td>
    </tr>
    </tbody>
</table>
<table>
    <thead>
    <tr>
        <th>DISCIPLINAS</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            @foreach ( $degree->subjects as $subject)
                {{$subject->name}}||
            @endforeach
        </td>
        {{-- @foreach ( $team->studentTeams as $student_team)
             @foreach ( $student_team->degrees as $degree)
                 @foreach ( $degree->subjects as $subject)
                     <td>{{$subject->name}}</td>
                 @endforeach
             @endforeach
         @endforeach--}}
    </tr>
    </tbody>
</table>