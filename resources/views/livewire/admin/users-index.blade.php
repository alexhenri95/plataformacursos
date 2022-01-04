<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" wire:keydown="limpiar_page" class="form-control" width="100%" placeholder="Buscar usuario...">
    	</div>

    	@if($users->count())

			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Email</th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td width="10px">
								<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>	

			<div class="card-footer">
				{{$users->links()}}
			</div>

		@else
			<div class="card-body">
				<strong>No hay resultados de búsqueda...</strong>
			</div>
		@endif
	</div>

</div>
