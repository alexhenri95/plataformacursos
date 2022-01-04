<x-app-layout>
	
	{{-- Header del curso --}}
	<section class="bg-gray-700 py-12 mb-10">
		<div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
			<figure>
				<img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
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
		<div class="order-2 lg:order-1 lg:col-span-2">

			{{-- Lo que aprenderas --}}
			<section class="card mb-8">
				<div class="card-body">
					<h1 class="font-semibold text-xl mb-2">Lo que aprenderás:</h1>

					<ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-1">
						@foreach($course->goals as $goal)
						<li class="text-gray-700 text-base"> <i class="fas fa-check text-xs text-blue-500 mr-2"></i> {{$goal->name}}</li>
						@endforeach
					</ul>
				</div>
			</section>

			{{-- Temario --}}
			<section class="mb-8">
				<h1 class="font-semibold text-xl mb-2">Temario:</h1>

				@foreach($course->sections as $section)
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
				@endforeach
			</section>

			{{-- Requisitos --}}
			<section class="card mb-8">
				<div class="card-body">
					<h1 class="font-semibold text-xl mb-2">Requisitos:</h1>

					<ul>
						@foreach($course->requirements as $requirement)
						<li class="text-gray-700 text-base"> <i class="fas fa-dot-circle text-xs text-blue-500 mr-2"></i> {{$requirement->name}}</li>
						@endforeach
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

			{{-- Reseñas --}}
			@livewire('course-reviews', ['course' => $course])

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

					@can('enrolled', $course)

						<a href="{{ route('courses.status', $course) }}" class="btn btn-danger btn-block mt-4">Continuar con el curso</a>

					@else
						@if($course->price->value == 0)
							<p class="text-3xl font-bold mt-8 text-gray-700 text-right">GRATIS</p>
							<form action="{{ route('courses.enrolled', $course) }}" method="POST">
								@csrf
								<button type="submit" class="btn btn-danger btn-block mt-4">Llevar este curso</button>
							</form>
						@else
							<p class="text-3xl font-bold mt-8 text-gray-700 text-right">{{$course->price->value}} $US</p>
							<a href="{{route('payment.checkout', $course)}}" class="btn btn-danger btn-block mt-2">Comprar este curso</a>
						@endif
					@endcan

				</div>
			</section>

			{{-- Cursos similares --}}
			<aside class="hidden lg:block">

				<p class="font-semibold text-xl mt-12 mb-4 border-b-2">Cursos Similares</p>

				@foreach($similares as $similar)
					<article class="flex mb-6 ">
						<img class="h-32 w-40 object-cover" src="{{ Storage::url($similar->image->url) }}" alt="">

						<div class="ml-3">
							<h1 class="mb-8">
								<a href="{{ route('courses.show', $course) }}" class="font-bold text-gray-800 text-md">
									{{ Str::limit($similar->title, 40) }}
								</a>
							</h1>

							<p class="text-gray-800 text-sm">
								<span class="font-bold">Prof:</span> {{$similar->teacher->name}}
							</p>

							<p><i class="fas fa-star mr-2 text-sm text-yellow-500"></i>{{$similar->rating}}</p>
						</div>

					</article>
				@endforeach
			</aside>

		</div>
	</div>

</x-app-layout>