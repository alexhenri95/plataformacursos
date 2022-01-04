<div class="my-8">
	<div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">

		<div class="lg:col-span-2">
			<div class="embed-responsive">
				{!!$current->iframe!!}
			</div>

			<h1 class="text-xl text-gray-800 font-bold mt-4">
				{!!$current->name!!}
			</h1>

			@if($current->description)
				<div class="text-gray-600">
					{{$current->description->name}}
				</div>
			@endif

			<div class="flex justify-between items-center mt-8">
				<div class="flex items-center cursor-pointer" wire:click="completed">
					@if($current->completed)
						<i class="fas fa-toggle-on text-2xl text-blue-600"></i>
					@else
						<i class="fas fa-toggle-off text-2xl text-gray-600"></i>
					@endif
					<p class="text-sm ml-2 text-gray-600">Marcar esta unidad como culminada</p>
				</div>

				@if($current->resource)
				<div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
					<p class="">Recurso</p>
					<i class="fas fa-download text-lg ml-2"></i>
				</div>
				@endif
				
			</div>

			<div class="card mt-8">
				<div class="card-body flex text-gray-600 font-bold">
					@if($this->previous)
						<a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer">Clase Anterior</a>
					@endif
					
					@if($this->next)
						<a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer">Siguiente Clase</a>
					@endif
				</div>
			</div>
			

			{{-- <p>Indice {{$this->index}}</p>
			<p>Previos @if($this->previous) {{$this->previous->id}} @endif</p>
			<p>Next @if($this->next) {{$this->next->id}} @endif</p> --}}
		</div>

		<div class="card">
			<div class="card-body">
				<h1 class="text-xl leading-8 text-center mb-6">
					{{$course->title}}
				</h1>

				<div class="flex items-center">
					<figure>
						<img class="w-12 h-12 rounded-full object-cover mr-4" src="{{$course->teacher->profile_photo_url}}" alt="">
					</figure>
					<div class="leading-5">
						<p class="font-semibold">{{$course->teacher->name}}</p>
						<a href="" class="text-blue-600 text-sm">{{'@' . Str::slug($course->teacher->name, '')}}</a>
					</div>
				</div>

				<p class="text-gray-600 text-sm mt-6">{{$this->advance . ' %'}} Completado</p>

				<div class="relative pt-1">
					<div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-300">
						<div style="width:{{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500"></div>
					</div>
				</div>

				<ul>
					@foreach($course->sections as $section)
						<li class="text-gray-700 mb-4">
							<a class="font-bold text-base mb-2 inline-block">{{$section->name}}</a>
							<ul>
								@foreach($section->lessons as $lesson)
									<li class="flex">
										<div class="">

											@if($lesson->completed)

												@if($current->id == $lesson->id)
													<span class="inline-block w-4 h-4 border-2 border-yellow-500 rounded-full mr-2"></span>
												@else
													<span class="inline-block w-4 h-4 bg-yellow-500 rounded-full mr-2"></span>
												@endif

											@else

												@if($current->id == $lesson->id)
													<span class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2"></span>
												@else
													<span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2"></span>
												@endif
											
											@endif

										</div>
										<a class="cursor-pointer text-sm" wire:click="changeLesson({{$lesson}})">{{$lesson->name}}
											{{-- @if($lesson->completed)
											(Completado)
											@endif --}}
										</a>
									</li>
								@endforeach
							</ul>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
