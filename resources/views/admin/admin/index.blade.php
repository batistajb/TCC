@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
@stop

@section('content')
    <h1 class="header-title">Dashboard</h1>
    <hr/>
    <div class="row">
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-light-blue"><i class="fas ion-university"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Alunos</span>
                    <span class="info-box-number">{{$students_count}}</span>
                    <a href="{{route('students.index')}}">
                        Mais informações <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-group"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Professores</span>
                    <span class="info-box-number">{{$teachers_count}}</span>
                    <a href="{{route('teacher.index')}}" class="small-box-footer">
                        Mais informações <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-object-group"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Turmas</span>
                    <span class="info-box-number">{{$teams_count}}</span>
                    <a href="{{route('team.index')}}" class="small-box-footer">
                        Mais informações <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h4>Histórico Escolar</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-archive"></i>
                </div>
                <a href="{{route('history.create')}}" class="small-box-footer">
                    Emissão <i class="fa fa-file-pdf-o"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <!-- AREA CHART -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="areaChart" style="height:350px" class="line-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
@section('adminlte_js')

    <script>

        /*script para chart/ ajax*/
        //Tipo, dados e opções
        $.ajax({
            url:'ajax-chart',
            success:function (response) {
                var label1              = [];
                var active1             = 0;
                var wait1               = 0;
                var old1                = 0;
                var active2             = 0;
                var wait2               = 0;
                var old2                = 0 ;
                var active3             = 0;
                var wait3               = 0;
                var old3                = 0 ;
                var active4             = 0;
                var wait4               = 0;
                var old4                = 0 ;
                var active5             = 0;
                var wait5               = 0;
                var old5                = 0 ;

                for(var i = 0; i < response.length; i++){
                    if((response[i].serie) == 1){
                        if((response[i].enroll) == 2) {
                            active1++;
                        }
                        if((response[i].enroll) == 0) {
                            old1++;
                        }
                        if((response[i].enroll) == 5) {
                            wait1++;
                        }
                    }
                    if((response[i].serie) == 2){
                        if((response[i].enroll) == 2) {
                            active2++;
                        }
                        if((response[i].enroll) == 0) {
                            old2++;
                        }
                        if((response[i].enroll) == 5) {
                            wait2++;
                        }
                    }
                    if((response[i].serie) == 3){
                        if((response[i].enroll) == 2) {
                            active3++;
                        }
                        if((response[i].enroll) == 0) {
                            old3++;
                        }
                        if((response[i].enroll) == 5) {
                            wait3++;
                        }
                    }
                    if((response[i].serie) == 4){
                        if((response[i].enroll) == 2) {
                            active4++;
                        }
                        if((response[i].enroll) == 0) {
                            old4++;
                        }
                        if((response[i].enroll) == 5) {
                            wait4++;
                        }
                    }
                    if((response[i].serie) == 5){
                        if((response[i].enroll) == 2) {
                            active5++;
                        }
                        if((response[i].enroll) == 0) {
                            old5++;
                        }
                        if((response[i].enroll) == 5) {
                            wait5++;
                        }
                    }
                }

                var ctx = document.getElementsByClassName("line-chart");

                var lineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels:["1º ano","2º ano","3º ano","4º ano","5º ano"],
                        datasets:[
                            {
                                label: "Matriculados",
                                data:[active1,active2,active3,active4,active5],
                                borderWidth: 6,
                                borderColor: 'rgba(77,166,253,0.85)',
                                backgroundColor: 'transparent',
                            },
                            {
                                label: "Rematriculas",
                                data:[old1,old2,old3,old4,old5],
                                borderWidth: 6,
                                borderColor: 'rgba(255, 0, 0,0.85)',
                                backgroundColor: 'transparent',
                            },
                            {
                                label: "Lista de espera",
                                data:[wait1,wait2,wait3,wait4,wait5],
                                borderWidth: 6,
                                borderColor: 'rgba(255, 153, 51,0.85)',
                                backgroundColor: 'transparent',
                            }
                        ]
                    },
                    options:{
                        title:{
                            display:true,
                            fontSize:20,
                            text:"Relação de alunos por série"
                        },
                        labels:{
                            fontStyle:"bold"
                        }
                    }
                });
            },
            error:function () {
                
            }
        })
        
    </script>

@stop