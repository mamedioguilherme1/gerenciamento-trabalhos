@extends('template.template')

@section('title', 'Cursos')

@section('sidebar')
<a href="{{url('panel')}}" class="w3-button w3-padding">Voltar atrás</a>
@endsection

@section('content')
<article class="col-md-9 col-md-offset-3">
    <div class="panel panel-default" style="text-align: center;">
    <h3>Gerenciamento de cursos</h3>
    <hr>
        <div class="panel-body">
        {!! Form::open(['url' => '/course/new', 'method' => 'post']) !!}

            <div class="row">
                <div class="form-group col-md-9">
                    {{ Form::label('name', 'Nome do curso') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'required' => '']) }}
                </div>

                <div class="form-group col-md-3">
                    {{ Form::label('abbreviation', 'Abreviação do curso') }}
                    {{ Form::text('abbreviation', '', ['class' => 'form-control', 'required' => '', 'maxlength' => 4 ]) }}
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-8 text-danger">
                @if(isset($erro))
                    {{$erro}}
                @endif

                @if(session('erro'))
                    {{ session('erro') }}
                @endif
                </div>

                <div class="col-md-12 text-right">
                    {{  Form::submit('Cadastrar', ['class' => 'btn btn-default']) }}
                </div>
            </div>
        {!! Form::close() !!}
        </div>
<br>
        {{ $courses->links() }}
        <table class="table" style="margin-left: 5px ; padding-right: 20px">
            <thead>
                <tr>
                    <th>Nome do curso</th>
                    <th>Abreviação</th>
                </tr>
            </thead>
            <tbody style="text-align: left;">
                @foreach($courses as $course)
                  <tr>
                    <td>{{$course->name}}</td>
                    <td>{{$course->abbreviation}}</td>
                    <td>
                        <div class="botao-index">
                            <a class="btn btn-xs btn-primary" href="{{ url('course/'.$course->id.'/edit') }}">
                                <i class="glyphicon glyphicon glyphicon-edit"></i> Editar
                            </a>

                            <a class="btn btn-xs btn-danger" href="{{url('course/'.$course->id.'/delete') }}">
                                <i class="glyphicon glyphicon glyphicon-trash"></i> Apagar
                            </a>
                        </div>
                    </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
