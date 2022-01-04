@extends('adminlte::page')

@section('title', 'Plataforma De Cursos')

@section('content_header')
    <h1>Asignar Un Rol</h1>
@stop

@section('content')
    <div class="card">
    	<div class="card-body">
    		<h1 class="h6">Nombre:</h1>
    		<p class="form-control">{{ $user->name}}</p>

    		<h1 class="h6">Lista de roles:</h1>
    		{!! Form::model($user, ['route' => ['admin.users.update', $user], 'method'=> 'put']) !!}

    			@foreach($roles as $role)
    			<div>
    				<label>
    					{!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
    					{{$role->name}}
    				</label>
    			</div>
    			@endforeach

    			{!! Form::submit('Asignar rol', ['class'=>'btn btn-primary mt-3']) !!}

    		{!! Form::close() !!}
    	</div>
    </div>
@stop