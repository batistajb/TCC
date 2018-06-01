@extends('adminlte::page')

@section('title', 'Grade escolar')

@section('content_header')

    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="{{route('degree')}}">Grades</a></li>
        <li><i class="fa fa-edit"></i> <a href="">Edição Grade</a></li>
    </ol>
    <div class="box-default">
        <div class="container-fluid col-md-12">
            <div class="box-header">
                <h1 class="box-tile">Editar professor(a)</h1>
            </div>

            <section class="content">
                <form method="post" action="">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="box box-default">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input id="name" name="name" type="text" required="required" class="input-group"
                                               style="width: 100%;"/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="cpf">CPF:</label>
                                        <input id="cpf" name="cpf" type="text" required="required" class="input-group"
                                               style="width: 100%;"/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="regime">Regime</label>
                                        <select class="form-control select2" style="width: 100%;" title="regime">
                                            <option value="contract">Contrato</option>
                                            <option value="effective">Efetivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <div class="box-footer">
                            <div class="form-group col-md-8">
                                <input class="btn btn-success" type="submit" value="Salvar"/>
                                <a class="btn btn-danger" href="{{route('teacher.index')}}">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>

@stop