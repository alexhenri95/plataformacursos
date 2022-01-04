@extends('adminlte::page')

@section('title', 'Plataforma De Cursos')

@section('content_header')
    <h1>Lista De Roles</h1>
@stop

@section('content')
	
	@if(session('info'))
	<div class="alert alert-primary" role="alert">
	    <strong>Éxito!! </strong> {{session('info')}}
	</div>
	@endif

    <div class="card">
    	<div class="card-header">
    		<a href="{{ route('admin.roles.create') }}">Crear rol</a>
    	</div>
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>ID</th>
    					<th>Rol</th>
    					<th colspan="2"></th>
    				</tr>
    			</thead>

    			<tbody>
    				@forelse($roles as $role)
    				<tr>
    					<td>{{ $role->id }}</td>
    					<td>{{ $role->name }}</td>
    					<td width="10px">
    						<a href="{{route('admin.roles.edit', $role)}}" class="btn btn-secondary btn-sm">Editar</a>
    					</td>
    					<td width="10px">
    						<form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
    							@csrf
    							@method('delete')
    							<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
    						</form>
    					</td>
    				</tr>
    				@empty
    				<tr>
    					<td colspan="4">No hay roles registrados.</td>
    				</tr>
    				@endforelse
    			</tbody>
    		</table>
    	</div>
    </div>
@stop
