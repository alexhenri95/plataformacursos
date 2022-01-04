@extends('adminlte::page')

@section('title', 'Plataforma De Cursos')

@section('content_header')
    <h1>Crear nuevo nivel</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.levels.store']]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nivel') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nivel']) !!}

                    @error('name')
                        <strong class="text-danger small font-weight-bold">(*) {{$message}}</strong>
                    @enderror
                </div>
                {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop