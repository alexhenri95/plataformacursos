<div class="container py-8">

	<x-table-courses>

		<div class=" flex px-6 py-4">
			<input wire:keydown="limpiar_page" wire:model="search" type="text" class="flex-1 form-input w-full shadow-sm rounded" placeholder="Ingrese el nombre del curso a buscar...">
			<a class="btn btn-danger ml-2 " href="{{ route('instructor.courses.create') }}">Crear nuevo curso</a>
		</div>

		@if($courses->count())

			<table class="min-w-full divide-y divide-gray-200">
				<thead class="bg-gray-50">
					<tr>
						<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Curso
						</th>
						<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Alumnos
						</th>
						<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Calificación
						</th>
						<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Estado
						</th>
						<th scope="col" class="relative px-6 py-3">
							<span class="sr-only">Edit</span>
						</th>
					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200">
					@foreach($courses as $course)
					<tr>
						<td class="px-6 py-4 whitespace-nowrap">
							<div class="flex items-center">
								<div class="flex-shrink-0 h-10 w-10">
									@isset($course->image)
									<img class="h-10 w-10 rounded-full" src="{{ Storage::url($course->image->url) }}" alt="">
									@else
										<img class="h-10 w-10 rounded-full" src="https://cdn.pixabay.com/photo/2016/02/18/19/25/pc-1207886_960_720.jpg" alt="">
									@endisset
								</div>
								<div class="ml-4">
									<div class="text-sm font-medium text-gray-900">
										{{$course->title}}
									</div>
									<div class="text-sm text-gray-500">
										{{$course->category->name}}
									</div>
								</div>
							</div>
						</td>
						<td class="px-6 py-4 whitespace-nowrap">
							<div class="text-sm text-gray-900">
								{{$course->students->count()}}
							</div>
							<div class="text-sm text-gray-500">Inscritos</div>
						</td>
						<td class="px-6 py-4 whitespace-nowrap">
							<div class="text-sm text-gray-900 flex items-center">
								{{ $course->rating }}
								<ul class="flex text-sm ml-3">
									<li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow':'gray' }}-400"></i></li>
									<li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow':'gray' }}-400"></i></li>
									<li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow':'gray' }}-400"></i></li>
									<li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow':'gray' }}-400"></i></li>
									<li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 5 ? 'yellow':'gray' }}-400"></i></li>
								</ul>
							</div>
							<div class="text-sm text-gray-500">
								Puntos
							</div>
						</td>
						<td class="px-6 py-4 whitespace-nowrap">
							@switch($course->status)
							    @case(1)
							        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
										Borrador
									</span>
							        @break
								@case(2)
							        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
										Revisión
									</span>
							        @break
							    @case(3)
							        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
										Publicado
									</span>
							        @break
							    @default
							@endswitch

						</td>
						<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
							<a href="{{ route('instructor.courses.edit', $course) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			<div class="my-2 mx-4">
				{{$courses->links()}}
			</div>

		@else
			<div class="px-6 py-4">
				No hay registros de búsqueda.
			</div>
		@endif
	</x-table-courses>

</div>
