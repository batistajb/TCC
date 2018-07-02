<div class="row">
    <div class="box-default">
        <div class="container-fluid col-md-12">
            <div class="container-fluid">
                <div class="box-body table-responsive no-padding">
                    <table id="infoTurma" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nome:</th>
                            <th>Série:</th>
                            <th>Responsável:</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody id="student_teams">
                        @forelse($students as $student)
                            <tr>
                                <td>{{$student->name}}</td>
                                <td>{{$student->serie}}º ano</td>
                                <td>{{$student->responsible['name_responsible']}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete" data-whatever="{{$student->id}}">
                                        <i class="ion-close-circled"></i> Lista de espera
                                    </button>
                                </td>
                            </tr>
                            @empty
                                <th>Nenhum registro cadastrado!</th>
                                <th/>
                                <th/>
                                <th/>
                                <th/>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>