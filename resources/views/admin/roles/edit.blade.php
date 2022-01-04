@extends('adminlte::page')

@section('title', 'Plataforma De Cursos')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		{!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT']) !!}

    			@include('admin.roles.partials.form')

    			{!! Form::submit('Actualizar', ['class'=>'btn btn-primary mt-4']) !!}

    		{!! Form::close() !!}
    	</div>
    </div>
@stop
