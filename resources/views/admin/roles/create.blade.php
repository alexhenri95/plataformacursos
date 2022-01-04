@extends('adminlte::page')

@section('title', 'Plataforma De Cursos')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		{!! Form::open(['route' => 'admin.roles.store']) !!}

    			@include('admin.roles.partials.form')

    			{!! Form::submit('Crear', ['class'=>'btn btn-primary mt-4']) !!}

    		{!! Form::close() !!}
    	</div>
    </div>
@stop
