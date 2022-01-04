<div class="form-group">
	{!! Form::label('name', 'Rol: ') !!}
	{!! Form::text('name', null, ['class'=>'form-control'.($errors->has('name') ? ' is-invalid':''), 'placeholder'=>'Nombre del rol...']) !!}
	@error('name')
	<span class="invalid-feedback">
		<strong>{{$message}}</strong>
	</span>
	@enderror
</div>

<div class="mb-3">
	<strong>Permisos:</strong>
</div>

@foreach($permissions as $permission)
<div>
	<label>
		{!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
		{{$permission->name}}
	</label>
</div>
@endforeach

@error('permissions')
<span class="text-danger text-xs">
	<strong>{{$message}}</strong>
</span>
<br>
@enderror