<x-app-layout>
	
	{{-- Header del curso --}}
	<section class="bg-gray-700 py-12 mb-10">
		<div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
			<figure>
				@if($course->image)
					<img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
				@else
					<img class="h-60 w-full object-cover"  src="https://cdn.pixabay.com/photo/2016/02/18/19/25/pc-1207886_960_720.jpg" alt="">
				@endif
				
			</figure>

			<div class="text-white">
				<h1 class="text-4xl">{{$course->title}}</h1>
				<h2 class="text-2xl mb-3">{{$course->subtitle}}</h2>
				<p class="mb-2"><i class="fas fa-chart-line mr-2"></i>Nivel: {{ $course->level->name }}</p>
				<p class="mb-2"><i class="fas fa-tags mr-2"></i>Categoría: {{ $course->category->name }}</p>
				<p class="mb-2"><i class="fas fa-users mr-2"></i>Inscritos: {{ $course->students_count }}</p>
				<p class="mb-2"><i class="fas fa-star mr-2"></i>Puntuación: {{ $course->rating }}</p>
			</div>
		</div>
	</section>

	<div class="container grid grid-cols-1 lg:grid-cols-3 mb-10 gap-6">

		@if(session('info'))
		<div class="lg:col-span-3" x-data="{open: true}" x-show="open">
			<div class="flex items-center justify-between bg-red-900 text-center py-2 lg:px-4 rounded">
				<div class="p-2 bg-red-800 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
					<span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">Error</span>
					<span class="font-semibold mr-2 text-left flex-auto">{{session('info')}}</span>
				</div>
				<span class="px-4">
				    <svg x-on:click="open=false" class="fill-current h-5 w-5 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
				</span>
			</div>
		</div>
		@endif

		<div class="order-2 lg:order-1 lg:col-span-2">

			{{-- Lo que aprenderas --}}
			<section class="card mb-8">
				<div class="card-body">
					<h1 class="font-semibold text-xl mb-2">Lo que aprenderás:</h1>

					<ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-1">
						@forelse($course->goals as $goal)
							<li class="text-gray-700 text-base"> <i class="fas fa-check text-xs text-blue-500 mr-2"></i> {{$goal->name}}</li>
						@empty
							<li class="text-gray-700 text-base"> <i class="fas fa-times text-xs text-red-500 mr-2"></i> Este curso no tiene asignado ninguna lección.</li>
						@endforelse
					</ul>
				</div>
			</section>

			{{-- Temario --}}
			<section class="mb-8">
				<h1 class="font-semibold text-xl mb-2">Temario:</h1>

				@forelse($course->sections as $section)
					<article class="mb-3 shadow" 
					@if($loop->first) 
						x-data="{open: true}"
					@else
						x-data="{open: false}"
					@endif
					>
						<header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open= !open">

							<h1 class="font-semibold text-lg text-gray-600">
								<i class="fas fa-plus text-sm mr-2" x-show="open"></i>
								<i class="fas fa-minus text-sm mr-2" x-show="!open"></i>
								{{ $section->name }}
							</h1>

						</header>

						<div class="bg-white py-2 px-4" x-show="open">
							<ul class="grid grid-col-1 gap-2">
								@foreach($section->lessons as $lesson)
									<li class="text-gray-700 text-base "><i class="fas fa-play-circle mr-2 text-sm text-gray-500"></i>{{$lesson->name}}</li>
								@endforeach
							</ul>
						</div>
					</article>
				@empty
					<article class="card">
						<div class="card-body">
							<i class="fas fa-times text-xs text-red-500 mr-2"></i> Este curso no tiene ninguna sección.
						</div>
					</article>
				@endforelse
			</section>

			{{-- Requisitos --}}
			<section class="card mb-8">
				<div class="card-body">
					<h1 class="font-semibold text-xl mb-2">Requisitos:</h1>

					<ul>
						@forelse($course->requirements as $requirement)
							<li class="text-gray-700 text-base"> <i class="fas fa-dot-circle text-xs text-blue-500 mr-2"></i> {{$requirement->name}}</li>
						@empty
							<li class="text-gray-700 text-base"> <i class="fas fa-times text-xs text-red-500 mr-2"></i> Este curso no tiene ningun requerimiento.</li>
						@endforelse
					</ul>
				</div>
			</section>

			{{-- Descripcion --}}
			<section class="card mb-8">
				<div class="card-body">
					<h1 class="font-semibold text-xl mb-2">Descripción:</h1>

					<div class="tet-gray-700 text-base">
						{!!$course->description!!}
					</div>
				</div>
			</section>

		</div>

		<div class="order-1 lg:order-2">

			{{-- Info del profesor e inscripcion --}}
			<section class="card mb-4">
				<div class="card-body">
					<div class="flex items-center">
						<img class="h-14 w-14 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">

						<div class="ml-4">
							<h1 class="font-semibold text-gray-600 text-lg">Prof: {{$course->teacher->name}}</h1>
							<a href="" class="text-blue-500 text-sm font-semibold">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
						</div>
					</div>	

					<form action="{{route('admin.courses.approved', $course)}}" class="mt-8" method="POST">
						@csrf
						<button type="submit" class="btn btn-primary w-full">Aprobar curso</button>
					</form>

					<a href="{{route('admin.courses.observation', $course)}}" class="btn btn-danger w-full block text-center mt-4">Observar curso</a>

				</div>
			</section>

		</div>
	</div>

</x-app-layout>