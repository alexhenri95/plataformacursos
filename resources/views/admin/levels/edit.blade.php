@extends('adminlte::page')

@section('title', 'Plataforma De Cursos')

@section('content_header')
    <h1>Editar nivel</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <i class="fas fa-check mr-2"></i>{{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($level, ['route' => ['admin.levels.update', $level], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nivel') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nivel']) !!}

                    @error('name')
                        <strong class="text-danger small font-weight-bold">(*) {{$message}}</strong>
                    @enderror
                </div>
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop