@extends('adminlte::page')

@section('title', 'Plataforma De Cursos')

@section('content_header')
    <h1>Crear nuevo precio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.prices.store']]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del precio']) !!}

                    @error('name')
                        <strong class="text-danger small font-weight-bold">(*) {{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('value', 'Valor') !!}
                    {!! Form::number('value', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el valor del nivel']) !!}

                    @error('value')
                        <strong class="text-danger small font-weight-bold">(*) {{$message}}</strong>
                    @enderror
                </div>
                {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop