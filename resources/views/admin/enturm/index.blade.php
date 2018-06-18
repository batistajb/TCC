@extends('adminlte::page')

@section('title', 'Enturmação')

@section('content_header')

    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li><i class="fa fa-group"></i> <a href="">Enturmação</a></li>
    </ol>
    <div class="col-md-12">
        <h1>Gerenciamento das enturmação</h1>
    </div>
@endsection

@section('content')
    @if($layout==0)
        {!! Form::open(array('url'=>route('enturm.destroy','test')))!!}
        {{method_field('DELETE')}}
        @include('admin.enturm.table-index')
        {{Form::close()}}
    @else
        <div class="container-fluid col-md-6">
            <hr/>
            {!! Form::open(array('url'=>route('enturm.store')))!!}
            {{-- @include('admin.enturm.table')--}}
            <input type="hidden" value="{{$team->serie}}" name="serie"/>
            <input type="hidden" value="{{$degree->id}}" name="degree_id"/>
            <input type="hidden" value="{{$team->id}}" name="team_id"/>
        </div>

        <div class="container-fluid col-md-8">
            @include('admin.enturm.table-info')
        </div>
        <div class="container-fluid col-md-12">
            <div class="col-md-3">
                <h1>
                    <button type="submit" class="btn btn-success">ENTURMAR ALUNOS</button>
                </h1>
            </div>
            {{Form::close()}}
            <div class="col-md-3">
                <h1><a class="btn btn-warning" href="{{route('enturm.index')}}"><i class="fa fa-history"></i>Escolher
                        outra turma</a></h1>
            </div>
        </div>
        <div class="col-md-12">
            @include('admin.enturm.table-students')
        </div>
        <div class="modal  fade in" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas ion-close"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('enroll.destroy','test')}}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <div class="modal-body">
                                <h3 class="text-center">Deseja realmente colocar matrícula na lista de espera?</h3>
                                <input type="hidden" name="category_id" id="cat_id" value=""/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Não, cancelar
                                </button>
                                <button type="submit" class="btn btn-danger">Sim,confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (session('status'))
        <script>
            confirm("{{session('status')}}");
        </script>
    @endif

@stop

@section('adminlte_js')
    @include('admin.enturm.js')
@endsection